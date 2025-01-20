<template>
    <div class="task-container">
        <div class="task-content">
            {{ task }}
        </div>
    </div>

</template>

<script>
export default{
    name: "SingleTask",

    props: {
        task:{
            type: String
        },

        id: {
            type: Number,
            required: true
        }
    },

}
</script>