<template>
    <div class="task-content">
        {{ task }}
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