<template>
    <div :class="`ml-${indent}`" class="flex flex-col flex-col-reverse">

        <div style="border-left: solid 2px; padding-left: 6px;">
            <template v-for="(resource, key) in ungrouped">
                <grouped-resource-list-item
                    :resource="resource"
                    :key="key"/>

            </template>
        </div>

        <div>
            <template v-for="(group, key) in grouped">
                <grouped-resource-collapsable
                    :key="key"
                    :header="key">

                    <grouped-resource-collection
                        :resources="removeCurrentKey(group)"
                        :indent="indent + 1"/>

                </grouped-resource-collapsable>
            </template>
        </div>


    </div>
</template>

<script>
    import GroupedResourceCollapsable from "./GroupedResourceCollapsable";

    export default {
        name: "GroupedResourceCollection",
        components: {
            'grouped-resource-collapsable': GroupedResourceCollapsable
        },
        props: {
            'resources': {
                type: Object
            }, 'indent': {
                default: 0
            }
        },
        created() {
            console.log(`created GroupedResourceCollection`, {
                all_groups: this.all_groups
            }, {
                grouped: this.grouped
            }, {
                ungrouped: this.ungrouped
            });
        },
        methods: {
            removeCurrentKey(group) {
                console.log(group);

                return group;
            }
            //
        },

        computed: {
            grouped() {
                let all = this.all_groups;
                return Object.keys(all).filter(k => k !== 'undefined').reduce((i, k) => {
                    i[k] = all[k];
                    return i;
                }, {})
            },
            ungrouped() {
                return _.first(_.filter(this.all_groups, (g, key) => key == 'undefined'));
            },

            all_groups() {
                return _.groupBy(this.resources, r => Object.values(r.grouping)[this.indent])

            },
        }

    }
</script>

<style scoped>

</style>
