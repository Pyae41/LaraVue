<template>
  <div>
    <LayoutComponent>
        <h3>Welcome from dashboard</h3>
    </LayoutComponent>
  </div>
</template>

<script>

import LayoutComponent from './layouts/LayoutComponent.vue';

export default {
  name: "DashboardComponent",
  components: {
    LayoutComponent
  },

};
</script>
