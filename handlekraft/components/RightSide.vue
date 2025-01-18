<template>
    <h3>Toutes les tâches</h3>
    <div class="all-tasks">
        <SingleTask v-for="task in tasks" :key="task.id" v-bind="task" />
    </div>
</template>

<script>
import SingleTask from './SingleTask.vue';

export default {
    name: "RightSide",

    data() {
        return {
            tasks: []
        }
    },

    components: {
        SingleTask
    },

    methods: {
        getTasks(){
            fetch(`http://127.0.0.1:8000/api/task`, {
                method: "GET"
            })
            .then(res => res.json())
            .then(tasklist => this.tasks = tasklist)
            .catch(err => console.log(err));
            console.log(this.tasks);
        }
    },

    created(){
        this.getTasks();
    }
}
</script>