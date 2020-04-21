<template>
    <li class="leading-wide my-1 text-sm list-unstyled" :key="key">
        <router-link :to="{
                    name: 'index',
                    params: {
                        resourceName: resource.uriKey
                    }
                }" class="text-white ml-8 no-underline dim">
            {{ resource.label }}
        </router-link>
    </li>
</template>

<script>
    export default {
        name: "GroupedResourceListItem",
        props: ['resource','key'],
        mounted() {
            console.log("GroupedResourceListItem mounted", this.resource, this.key)
        },
        computed: {
            to_resource_link() {
                return {
                    name: 'index',
                    params: {
                        resourceName: this.resource.uriKey
                        // resourceName: '{{ $resource::uriKey() }}'
                    }
                }
            },
        }
    }
</script>

<style scoped>
.list-unstyled{
    list-style: none;
}
</style>
