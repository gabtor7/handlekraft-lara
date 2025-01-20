<template>
    <div class="content-blocks-wrapper">
        <div class="left-panel content-panel">
            <LeftSide />
        </div>
        <div class="right-panel content-panel">
            <RightSide />
        </div>
    </div>

</template>

<script>
import LeftSide from './LeftSide.vue';
import RightSide from './RightSide.vue';

export default{
    name:"MainContent",
    components: {
        LeftSide, RightSide
    }
}
</script>