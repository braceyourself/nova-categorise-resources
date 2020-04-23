<template>
    <div class="pb-2">
        <h4 ref="nova-category"
            class="leading-wide font-bold text-white-50% mb-2 text-sm capitalize cursor-pointer hover:text-white"
            @click.prevent="toggle">

            <template v-if="expanded">&minus;</template>
            <template v-else>&plus;</template>
<!---->
            {{ header }}

        </h4>

        <slot v-if="expanded"></slot>
    </div>
</template>

<script>
    export default {
        created() {
        },
        props: {
            header: {
                type: String
            },
        },
        data() {
            return {
                expanded: false,
            };
        },
        methods: {
            toggle() {
                this.expanded = !this.expanded
            }
        }
    }
</script>
