<template>
    <div class="mb-6 pl-8">
        <grouped-resource-collection :resources="resources"/>
    </div>
</template>

<script>
    import GroupedResourceCollapsable from "./GroupedResourceCollapsable";
    import GroupedResourceListItem from "./GroupedResourceListItem";
    import GroupedResourceCollection from "./GroupedResourceCollection";

    export default {
        components: {
            'grouped-resource-collapsable': GroupedResourceCollapsable,
            'grouped-resource-collection': GroupedResourceCollection,
            'grouped-resource-list-item': GroupedResourceListItem,
        },
        name: "ResourceGroups",
        props: ['resource_json', 'indent'],
        data() {
            return {
                data: null,
                start_indent: 1
            }
        },
        created() {
            this.data = this.resource_json;


        },
        methods: {
            getGroupName(group, index) {

            },
            uniqueGrouping(group, grouping_index) {
                let groupings = [];
                _.forEach(group, g => groupings.push(g.grouping[`${grouping_index}`]))

                return _.uniq(groupings)
            },
            isGroupName(name) {
                let res = _.has(this.resources, name);

                return res;
            },
            hasGroups(data) {
                let res = data[Object.keys(data)[0]].uriKey === undefined;

                return res;
            },
            hasResources(data) {
                let res = _.has(data[Object.keys(data)[0]], 'uriKey')
                return res;
            },
            isResource(data) {
                let res = _.has(data, 'uriKey')
                return res;

            },
            count(object) {

                if (object === null || object === undefined) return 0;

                return Object.keys(object).length
            }
        },
        computed: {
            resources() {
                return this.data.resources || this.data;
            },
            group_names() {
                return _.sortBy(this.data.groups, (group) => {
                    return Object.keys(group).length
                });
            },
            real_indent() {
                return this.start_indent + this.indent;
            },
            _() {
                return _;
            }

        }
    }
</script>

<style scoped>

</style>
