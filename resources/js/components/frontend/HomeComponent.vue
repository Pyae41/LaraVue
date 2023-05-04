<template>
  <div class="bg-gray-100">
    <div
      class="container bg-[url('https://img.freepik.com/free-vector/online-shopping-poster-with-realistic-alarm-clock-product-cart-gifts-phone-vector-illustration_548887-250.jpg?w=1380&t=st=1683128764~exp=1683129364~hmac=41df8187f024764c0be19cd1845875c672ddd456c821280c2724c865c38e2570')] bg-auto bg-center h-52 flex items-end justify-center"
    >
      <div class="w-1/2">
        <div class="flex">
          <label
            for="search-dropdown"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
          >Your Email</label>
          <button
            id="dropdown-button"
            data-dropdown-toggle="dropdown"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
            type="button"
          >
            All categories
            <svg
              aria-hidden="true"
              class="w-4 h-4 ml-1"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"
              />
            </svg>
          </button>
          <div
            id="dropdown"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
          >
            <ul
              class="py-2 text-sm text-gray-700 dark:text-gray-200"
              aria-labelledby="dropdown-button"
              v-for="(category, index) in categories"
              :key="index"
            >
              <router-link :to="`/client/products/${category.name}`">
                <li>
                  <button
                    type="button"
                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                  >{{ category.name }}</button>
                </li>
              </router-link>
            </ul>
          </div>
          <div class="relative w-full">
            <input
              type="search"
              id="search-dropdown"
              class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
              placeholder="Search"
              required
              :value="item_name"
              @input="item_name = $event.target.value"
            />
            <button
              @click.prevent="search"
              type="submit"
              class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              <svg
                aria-hidden="true"
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                />
              </svg>
              <span class="sr-only">Search</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="container w-2/3 mx-auto mt-20 space-y-5">
      <div class="container flex justify-between">
        <h2 class="text-xl font-bold">What are you looking for ?</h2>
        <a href="#" class="text-purple-500">View More &gt;</a>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">
        <div
          class="relative p-4 w-full bg-white rounded-lg overflow-hidden hover:shadow flex flex-col justify-center items-center"
          style="min-height: 160px"
          v-for="(category, index) in categories"
          :key="index"
        >
          <router-link :to="`/client/products/${category.name}`">
            <img
              :src="`/storage/${category.category_img}`"
              class="w-16 h-16 bg-gray-100 rounded-lg"
            />

            <h2 class="mt-2 text-gray-800 text-sm font-semibold line-clamp-1">{{ category.name }}</h2>
          </router-link>
        </div>
      </div>
    </div>

    <div class="container w-2/3 mx-auto mt-20">
      <div class="container flex justify-between">
        <h2 class="text-xl font-bold">Recent Items</h2>
        <a href="#" class="text-purple-500">View More &gt;</a>
      </div>

      <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
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
  </div>
</template>

<script>
import ApiCalls from "../../api/ApiCalls";
export default {
  name: "HomeComponent",
  data() {
    return {
      categories: [],
      items: [],
      item_name: ""
    };
  },
  mounted() {
    this.getCategories();
    this.getItems();
  },
  methods: {
    async getCategories() {
      let data = await ApiCalls.get("client/getCategories");

      this.categories = data.categories.data;
      console.log(this.categories);
    },
    async getItems() {
      let data = await ApiCalls.get("client/getItems");

      this.items = data.items.data;
      console.log(this.items);
    },
    async search() {
      let data = await ApiCalls.search("client/search", {item_name: this.item_name});

      this.items = data.items;
    }
  }
};
</script>

<style>
</style>
