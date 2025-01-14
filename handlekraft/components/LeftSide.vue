<template>
    <form class="task-input-form" spellcheck="false">
        <textarea id="task-input" name="task-input" placeholder="C'est quoi le plan ?" rows="10" v-model="taskInput"></textarea>
        <input id="task-submit" type="submit" value="Ajouter" :click="addTask">
    </form>
</template>

<script>
export default{
    name: "LeftSide",
    data: {

    },
    methods: {
        addTask(data){
            // ajouter la tâche, via la requête API correspondante
            // -> fonction API pas encore définie
        }
    }
}
</script>