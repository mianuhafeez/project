<template>
    <div class="table-responsive todo_list">
        <div class="flex justify-between mb-3">
            <div class="flex items-center">
                <span class="mr-2 mt-2">Filter:</span>
                <select v-model="priorityFilter" id="priorityFilter" class="form-select">
                    <option value="">All</option>
                    <option value="HIGH">High</option>
                    <option value="MED">Medium</option>
                    <option value="LOW">Low</option>
                </select>
            </div>
            <div class="flex items-center">
                <span class="mr-2 mt-2">Sort:</span>
                <select v-model="sortOrder" id="sortOrder" class="form-select">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </div>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
            <tr class="bg-gray-200">
                <th class="text-left">Name</th>
                <th class="text-right cursor-pointer" @click="sortBy('due_date')">Due</th>
                <th class="cursor-pointer" @click="sortBy('priority')">Priority</th>
                <th class="text-left"><i class="zmdi zmdi-account"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="task in filteredTasks" :key="task.id">
                <td>
                    <div class="flex items-center">
                        <span class="text-sm font-medium">{{ task.name }}</span>
                    </div>
                </td>
                <td class="text-right">{{ task.due_date }}</td>
                <td class="text-center">
                        <span :class="getPriorityClass(task.priority)" class="py-1 px-2 rounded text-white">
                            {{ task.priority }}
                        </span>
                </td>
                <td class="w-1/12 text-center">
                        <span v-if="task.image">
                            <img :src="task.image" class="h-8 w-8 rounded-full" data-toggle="tooltip" :title="task.team" :alt="task.avatar">
                        </span>
                    <span v-else :class="getAvatarClass(task.priority)" class="h-8 w-8 rounded-full flex items-center justify-center bg-pink-500 text-white" data-toggle="tooltip" :title="task.team">
                            {{ task.avatar.toUpperCase() }}
                        </span>
                </td>
            </tr>
            <tr v-if="filteredTasks.length === 0">
                <td colspan="4" class="text-center py-4">No tasks found.</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        tasks: {
            type: Array,
            default: []
        }
    },
    data() {
        return {
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
    methods: {
        getPriorityClass(priority) {
            return {
                'bg-green-500': priority === 'HIGH',
                'bg-blue-500': priority === 'MED',
                'bg-yellow-500': priority === 'LOW',
                'py-1': true,
                'px-2': true,
                'rounded': true,
                'text-white': true,
            };
        },
        getAvatarClass(priority) {
            return {
                'bg-pink-500': priority === 'HIGH',
                'bg-blue-500': priority !== 'HIGH',
                'h-8': true,
                'w-8': true,
                'rounded-full': true,
                'flex': true,
                'items-center': true,
                'justify-center': true,
                'text-white': true,
            };
        },
        sortBy(field) {
            this.sortOrder = this.sortOrder === 'asc' ? 'desc' : 'asc';
        },
    },
};
</script>
