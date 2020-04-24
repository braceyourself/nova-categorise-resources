<template>
    <div class="mb-6 pl-8">
        <grouped-resource-collection :resources="data.resources"/>
    </div>
</template>

<script>
    export default {
        name: "ResourceGroups",
        props: ['data', 'indent'],
    }
</script>

<style scoped>

</style>
