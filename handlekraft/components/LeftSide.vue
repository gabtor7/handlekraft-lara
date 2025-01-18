<template>
    <form class="task-input-form" spellcheck="false">
        <textarea id="task-input" name="task-input" placeholder="C'est quoi le plan ?" rows="10" :description="taskInput"></textarea>
        <input id="task-submit" type="submit" value="Ajouter" v-on:click="addTask">
    </form>
</template>

<script>
export default{
    name: "LeftSide",
    data() {
        return {
            taskInput: ''
        }
    },
    methods: {
        onSubmit(e){
            e.preventDefault();
        },

        addTask(e){
            e.preventDefault();
            // ajouter la tâche, via la requête API correspondante
            fetch('http://127.0.0.1:8000/api/task', {
                method: 'POST',
                body: JSON.stringify({
                    task: this.taskInput
                })
            })
            .then(res => res.json)
            .catch(err => console.log(err));
            this.taskInput = '';
        }
    }
}
</script>