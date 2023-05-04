<template>
  <div class="grid lg:grid-cols-3 gap-x-4">
    <div class="p-3 flex items-center">
      <form @submit.prevent="submit" enctype="multipart/form-data" class="w-full">
        <div class="flex justify-between mb-3">
          <h5 class="font-bold">Sort by</h5>
          <button class="text-red-500" @click.prevent="clearFilter">Clear Filter</button>
        </div>
        <div class="mb-3">
          <label for="first_name" class="block mb-2 text-sm font-bold text-gray-900">Item name</label>
          <input
            type="text"
            id="first_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Book,etc....."
            required
            :value="filterData.item_name"
            @input="filterData.item_name = $event.target.value"
          />
        </div>
        <div class="mb-3">
          <div>
            <label
              for="last_name"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Price Range</label>
          </div>
          <div class="flex gap-x-4">
            <input
              type="text"
              id="min"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Min"
              required
              :value="filterData.minPrice"
              @input="filterData.minPrice = minPrice = $event.target.value"
            />
            <input
              type="text"
              id="max"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Max"
              required
              :value="filterData.maxPrice"
              @input="filterData.maxPrice = $event.target.value"
            />
          </div>
        </div>
        <div>
          <label
            for="company"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >Select Category</label>
          <select
            @change="filterData.category_id = $event.target.value"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          >
            <option value selected hidden>Select Category</option>
            <option
              v-for="(category, index) in categories"
              :value="category.id"
              :key="index"
            >{{ category.name }}</option>
          </select>
        </div>
        <div class="mb-6 space-y-6">
          <div>
            <label
              for="confirm_password"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Item Condition</label>
            <select
              @change="filterData.item_condition = $event.target.value"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            >
              <option value selected hidden>Select Item Condition</option>
              <option value="New">New</option>
              <option value="Used">Used</option>
              <option value="Good Second Hand">Good Second Hand</option>
            </select>
          </div>

          <div>
            <label
              for="confirm_password"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Item Type</label>
            <select
              @change="filterData.item_type = $event.target.value"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            >
              <option value selected hidden>Select Item Condition</option>
              <option value="For Sell">For Sell</option>
              <option value="For Buy">For Buy</option>
              <option value="For Exchange">For Exchange</option>
            </select>
          </div>
        </div>

        <button
          type="submit"
          class="text-white bg-green-700 hover:bg-blue-80 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center"
        >Apply Filter</button>
      </form>
    </div>
    <div
      class="col-span-2 mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8"
    >
      <div class="group relative mb-10 bg-white p-3" v-for="(item, index) in items" :key="index">
        <router-link :to="`/client/product/detail/${item.id}`">
          <div
            class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80"
          >
            <img
              :src="`/storage/${item.item_photo}`"
              alt="Front of men&#039;s Basic Tee in black."
              class="h-full w-full object-cover object-center lg:h-full lg:w-full"
            />
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">
                <a href="#">
                  <span aria-hidden="true" class="absolute inset-0"></span>
                  {{ item.item_name }}
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">$ {{ item.price }}</p>
            </div>
            <div>
              <span
                class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"
              >{{item.item_condition}}</span>
            </div>
          </div>
          <div class="mt-3 flex justify-between items-center">
            <div
              class="rounded-full w-12 h-12 bg-[url('https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=740&t=st=1683132709~exp=1683133309~hmac=c5adb7707b2aa45d7441797d420da0692a65ab4e2d630ce36ee635688815cc1e')] bg-cover"
            ></div>
            <h3>User Name</h3>
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import ApiCalls from "../../api/ApiCalls";
import { useRoute } from "vue-router";

export default {
  name: "ProductPageComponent",
  data() {
    return {
      items: [],
      categories: [],
      route: useRoute(),
      filterData: {
        item_name: "",
        minPrice: "",
        maxPrice: "",
        item_type: "",
        item_condition: "",
        category_id: ""
      }
    };
  },
  mounted() {
    this.getProducts();
    this.getCategories();
  },
  methods: {
    async getCategories() {
      const data = await ApiCalls.get("client/getCategories");
      this.categories = data.categories.data.filter(
        data => data.status == "Publish"
      );
    },
    async getProducts() {
      let data = await ApiCalls.getById(
        `client/products/${this.route.params.category}`
      );

      this.items = data.items;
      console.log(data);
    },
    async submit() {
      let data = await ApiCalls.filter("client/filter", this.filterData);
      this.items = data.items;
      console.log(data);
    },
    clearFilter() {
      this.filterData = {
        item_name: "",
        minPrice: "",
        maxPrice: "",
        item_type: "",
        item_condition: "",
        category_id: ""
      };
    }
  }
};
</script>

<style>
</style>
