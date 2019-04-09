<template>
  <div class="add_form__wrapper">
    <form v-on:submit.prevent="handleSubmit">
      <div class="form-group">
        <label for="name">Food item</label>
        <input
          class="form-control"
          type="text"
          placeholder="Enter food item name"
          v-model="food.item"
        >
      </div>

      <div class="form-group">
        <label for="name">Select category</label>
        <multiselect v-model="food.category" :options="categories"></multiselect>
      </div>

      <div class="form-group">
        <label for="name">Price</label>
        <input
          class="form-control"
          type="number"
          placeholder="Enter food item price"
          v-model="food.price"
        >
      </div>

      <!-- <div class="form-group">
        <label for="name">Description</label>
        <textarea
          class="form-control"
          v-model="food.description"
          placeholder="Enter item description"
        ></textarea>
      </div>-->

      <div class="form-group">
        <button class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
  props: ["categories"],

  components: {
    Multiselect
  },

  data() {
    return {
      food: {
        item: "",
        category: "",
        price: 100
      }
    };
  },

  methods: {
    handleSubmit() {
      console.log("form data", this.food); // this will log everything in the console for demo purposes.
      let postData = this.food;
      window.axios
        .post("api/item/save", postData)
        .then(response => {
          console.log("response", response.data);
        })
        .catch(error => console.log("error", error.response));
    }
  }
};
</script>


<style>
</style>
