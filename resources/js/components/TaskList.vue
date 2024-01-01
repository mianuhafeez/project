<template>
    <div class="table-responsive todo_list">
        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex align-items-center">
                <span class="form-label me-2 mt-2">Filter:</span>
                <select v-model="priorityFilter" id="priorityFilter" class="form-select">
                    <option value="">All</option>
                    <option value="HIGH">High</option>
                    <option value="MED">Medium</option>
                    <option value="LOW">Low</option>
                </select>
            </div>
            <div class="d-flex align-items-center">
                <span class="form-label me-2 mt-2">Sort:</span>
                <select v-model="sortOrder" id="sortOrder" class="form-select">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </div>
        </div>

        <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
            <thead>
            <tr>
                <th></th>
                <th class="w150 text-right" @click="sortBy('due_date')">Due</th>
                <th class="w100" @click="sortBy('priority')">Priority</th>
                <th class="w80"><i class="zmdi zmdi-account"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="task in filteredTasks" :key="task.id">
                <td>
                    <div class="custom-control custom-checkbox">
                        <span class="custom-control-label">{{ task.name }}</span>
                    </div>
                </td>
                <td class="text-right">{{ task.due_date }}</td>
                <td>
                    <span :class="getPriorityClass(task.priority)">{{ task.priority }}</span>
                </td>
                <td>
            <span v-if="task.image">
              <img :src="task.image" data-toggle="tooltip" data-placement="top" :title="task.team" alt="Avatar" class="avatar" :data-original-title="task.avatar">
            </span>
                    <span v-else>
              <span :class="getAvatarClass(task.priority)" data-toggle="tooltip" data-placement="top" :title="task.team" :data-original-title="task.avatar">{{ task.avatar.toUpperCase() }}</span>
            </span>
                </td>
            </tr>
            <tr v-if="filteredTasks.length === 0">
                <td colspan="4">No tasks found.</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            tasks: [],
            priorityFilter: '',
            sortOrder: 'asc',
        };
    },
    computed: {
        filteredTasks() {
            let filtered = [...this.tasks];

            if (this.priorityFilter) {
                filtered = filtered.filter(task => task.priority === this.priorityFilter);
            }

            if (this.sortOrder === 'asc') {
                filtered.sort((a, b) => new Date(a.due_date) - new Date(b.due_date));
            } else if (this.sortOrder === 'desc') {
                filtered.sort((a, b) => new Date(b.due_date) - new Date(a.due_date));
            }

            return filtered;
        },
    },
    mounted() {
        this.fetchTasks();
    },
    methods: {
        fetchTasks() {
            axios.get('/api/tasks')
                .then(response => {
                    this.tasks = response.data.tasks;
                })
                .catch(error => {
                    console.error('Error fetching tasks:', error);
                });
        },
        getPriorityClass(priority) {
            return {
                'badge bg-success': priority === 'HIGH',
                'badge bg-info': priority === 'MED',
                'badge bg-warning': priority === 'LOW',
            };
        },
        getAvatarClass(priority) {
            return {
                'avatar avatar-pink': priority === 'HIGH',
                'avatar avatar-blue': priority !== 'HIGH',
            };
        },
        sortBy(field) {
            if (this.sortOrder === 'asc') {
                this.sortOrder = 'desc';
            } else {
                this.sortOrder = 'asc';
            }
        },
    },
};
</script>
