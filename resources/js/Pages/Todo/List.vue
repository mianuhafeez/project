<template>
    <div>
        <div class="bg-gray-200">
            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px">
                   <li class="me-2">
                        <a href="#"
                           @click.prevent="activeTab = 'todo-list'"
                           :class=" activeTab === 'todo-list' ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg dark:text-blue-500 dark:border-blue-500': 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                           class="inline-block p-4 " aria-current="page"
                        >ToDo List</a>
                    </li>
                    <li class="me-2">
                        <a
                            href="#"
                            @click.prevent="activeTab = 'add-list'"
                            :class=" activeTab === 'add-list' ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg dark:text-blue-500 dark:border-blue-500': 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                            class="inline-block p-4 " aria-current="page">
                            Add Todo</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-3">
            <div class="container mx-auto px-4 py-4">
                <div>
                    <div class="tab-content">
                        <div
                            v-show="activeTab === 'todo-list'"
                            class="tab-pane" id="todo-list" role="tabpanel">
                            <div class="bg-white shadow-md rounded-md p-4">
                                <task-list :tasks="tasks.data"></task-list>
                            </div>
                        </div>
                        <div
                            v-show="activeTab === 'add-list'"
                            class="tab-pane" id="todo-add" role="tabpanel">
                            <section class="bg-white shadow-md rounded-md p-4">
                                <div class="container mx-auto">
                                    <div class="py-4">
                                        <task-form></task-form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TaskList from "../../Components/TaskList.vue";
import TaskForm from "../../Components/TaskForm.vue";

export default {
    components: {
        TaskList,
        TaskForm,
    },
    data() {
        return {
            activeTab: 'todo-list',
        }
    },
    props: {
        tasks: {
            type: Object,
            required: true
        }
    }
}
</script>
