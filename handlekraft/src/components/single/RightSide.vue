<template>
    <div class="single-task-container">
        <div class="single-task-content">
            {{ task }}
        </div>
        <div class="edition-controls">
            <button class="action-btn edit-btn" @click="open = !open"><img src="../../../assets/icons/feather/edit-3.svg" /></button>
            <button class="action-btn delete-btn" @click="openDelete = !openDelete"><img src="../../../assets/icons/feather/trash.svg" /></button>
        </div>
        <TaskDelete v-show="openDelete" :taskId="this.id" @cancel-delete="openDelete = false"></TaskDelete>
    </div>
</template>

<script>
import TaskDelete from './TaskDelete.vue';

export default {
    name: 'RightSide',

    components: {
        TaskDelete
    },

    data() {
        return {
            openDelete: false,
            open: false,
        }
    },

    props: {
        task: {
            type: String
        },
        id: {
            type: Number,
            required: true
        }
    }

}
</script>