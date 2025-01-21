<template>
    <div class="content-blocks-wrapper">
        <div class="left-panel content-panel">
            <LeftSide @reload-tasks="getTasks"/>
        </div>
        <div class="right-panel content-panel">
            <h3>Toutes les tâches</h3>
            <RightSide v-for="task in tasks" :key="task.id" v-bind="task" @reload-tasks="getTasks"/>
        </div>
    </div>

</template>

<script>
import LeftSide from '../single/LeftSide.vue';
import RightSide from '../single/RightSide.vue';

export default{
    name:"MainContent",
    components: {
        LeftSide, RightSide
    },
    data() {
        return{
            tasks: []
        }
    },

    methods: {
        getTasks(){
            fetch(`http://127.0.0.1:8000/api/task`, {
                method: "GET"
            })
            .then(res => res.json())
            .then(tasklist => this.tasks = tasklist.reverse())
            .catch(err => console.log(err));
        }
    },
    created(){
        this.getTasks()
    }
}
</script>