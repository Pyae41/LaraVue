<template>
  <div>
    <LayoutComponent>
      <h3 class="text-2xl m-5">Category List</h3>

      <router-link
        to="/category/add"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
      >Add Category</router-link>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead
            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
          >
            <tr>
              <th scope="col" class="px-6 py-3">Action</th>
              <th scope="col" class="px-6 py-3">No</th>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Publish</th>
            </tr>
          </thead>
          <tbody v-for="(category, index) in categories" :key="index">
            <CategoryComponent
              :category="category"
              :index="index"
              @delete="deleteCategory(category.id)"
              @publish="publishCategory(category.name,category.id,$event)"
            />
          </tbody>
        </table>
      </div>
    </LayoutComponent>
  </div>
</template>

<script>
import LayoutComponent from "./layouts/LayoutComponent.vue";
import CategoryComponent from "./CategoryComponent.vue";
import ApiCalls from "../api/ApiCalls";

export default {
  name: "CategoriesComponent",
  components: {
    LayoutComponent,
    CategoryComponent,
  },
  data() {
    return {
      categories: []
    };
  },
  mounted() {
    this.fetchCate();
  },
  methods: {
    async fetchCate() {
      let data = await ApiCalls.get(`category`);
      this.categories = data.categories.data;
      console.log(data);
    },
    deleteCategory(id) {
      ApiCalls.delete(`category/${id}`);
      this.fetchCate();
    },
    publishCategory(name, id, checked) {
      const updateData = {
        name: name,
        status: checked ? "Publish" : "Unpublish"
      };

      ApiCalls.update(`category/${id}`, updateData);
      this.fetchCate();
    }
  }
};
</script>
