import GroupedResourceListItem from "./components/GroupedResourceListItem";
import GroupedResourceCollection from "./components/GroupedResourceCollection";
import GroupedResourceCollapsable from "./components/GroupedResourceCollapsable";
import ResourceGroups from "./components/ResourceGroups";

Nova.booting((Vue, router) => {
    Vue.component('resource-groups', ResourceGroups);
    Vue.component('grouped-resource-collection', GroupedResourceCollection);
    Vue.component('grouped-resource-collapsable', GroupedResourceCollapsable);
    Vue.component('grouped-resource-list-item', GroupedResourceListItem);
});
