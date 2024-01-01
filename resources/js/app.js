import 'bootstrap';
import { createApp } from 'vue';

import RegisterForm from './components/RegisterForm.vue';
import LoginForm from './components/LoginForm.vue';
import  TasksList from './components/TaskList.vue';
import  TaskForm from './components/TaskForm.vue';
import axios from "axios";
import VueDatePicker from '@vuepic/vue-datepicker';

if (localStorage.getItem('token')) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
}
axios.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response?.status === 401) {
            localStorage.removeItem('token');
            axios.defaults.headers.common['Authorization'] = 'Bearer';
        }
        return Promise.reject(error);
    }
);
createApp({})
    .component('LoginForm', LoginForm)
    .component('RegisterForm', RegisterForm)
    .component('TasksList', TasksList)
    .component('TaskForm', TaskForm)
    .component('VueDatePicker', VueDatePicker)
    .mount('#app')
