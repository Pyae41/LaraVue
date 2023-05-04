<template>
  <LayoutComponent>
    <h3 class="text-2xl m-5">Item List</h3>

    <router-link
      to="/item/add"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
    >Add Item</router-link>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">Action</th>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Item</th>
            <th scope="col" class="px-6 py-3">Description</th>
            <th scope="col" class="px-6 py-3">Price</th>
            <th scope="col" class="px-6 py-3">Owner</th>
            <th scope="col" class="px-6 py-3">Publish</th>
          </tr>
        </thead>
        <tbody v-for="(item, index) in items" :key="index">
          <ItemComponent
            :item="item"
            :index="index"
            @publish="publishItem"
            @deleteItem="deleteItem(item.id)"
          />
        </tbody>
      </table>
    </div>
  </LayoutComponent>
</template>

<script>
import LayoutComponent from "../components/layouts/LayoutComponent.vue";
import ItemComponent from "./ItemComponent.vue";
import ApiCalls from "../api/ApiCalls";

export default {
  name: "ItemsComponent",
  components: { LayoutComponent, ItemComponent },
  data() {
    return {
      items: []
    };
  },
  mounted() {
    this.list();
  },
  methods: {
    async list() {
      let data = await ApiCalls.get(`item`);

      this.items = data.items.data;
    },
    deleteItem(id) {
      ApiCalls.delete(`item/${id}`);
      this.list();
    },
    publishItem({ checked, id, index }) {
      let updateData = this.items[index];

      updateData.status = checked ? "Publish" : "Unpublish";
      console.log(checked);

      ApiCalls.update(`item/${id}`, updateData);
      this.list();
    }
  }
};
</script>

<style>
</style>
