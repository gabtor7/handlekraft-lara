<template>
    <h3>Nouvelle tâche</h3>
    <form enctype="multipart/form-data" class="task-input-form" spellcheck="false">
        <textarea id="task-input" name="task-input" placeholder="C'est quoi le plan ?" rows="1" v-model="taskInput"></textarea>
        <input id="task-submit" type="submit" value="Ajouter" @click="addTask">
    </form>
</template>

<script>

export default{
    name: "LeftSide",
    emits: ['reload-tasks'],

    data() {
        return {
            taskInput: ''
        }
    },
    
    methods: {
        addTask(e){
            e.preventDefault();

            // ajouter la tâche, via la requête API correspondante
            fetch('http://127.0.0.1:8000/task', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'task': this.taskInput
                })
            })
            .then(() => {
                this.$emit('reload-tasks');
            })
            .catch(err => console.log(err));
            this.taskInput = '';
        }
    }
}
</script>