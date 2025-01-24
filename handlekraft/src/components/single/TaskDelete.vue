<template>
    <div class="confirmation-window">
        <div class="confirmation-window__message">
            Supprimer cette tâche ?
        </div>
        <div class="confirmation-window_buttons">
            <input type="button" class="btn btn-primary confirm-btn" value="Oui" @click="deleteTask">
            <input type="button" class="btn" value="Non" @click="closePopup">
        </div>
    </div>
</template>

<script>
export default{
    name: 'TaskDelete',

    emits: ['cancel-delete'],

    props: {
        taskId:{
            type: Number,
            required: true
        }
    },
    
    methods: {
        deleteTask(){
            
            fetch(`http://127.0.0.1:8000/api/task/${this.taskId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'text/html',
                    'Access-Control-Allow-Origin': '*'
                }
            })
            .then(() => {
                this.$parent.$parent.getTasks();
            })
            .catch(err => console.log(err))
            this.closePopup()
        },

        closePopup(){
            this.$emit('cancel-delete');
        },

        tasks(){
            this.$parent.$parent.getTasks();
        }
    }
}

</script>