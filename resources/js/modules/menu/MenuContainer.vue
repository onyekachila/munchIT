<template>
  <div class="wrapper menu__container">
    <div class="row">
      <div class="col-md-8">
        <card-component>
          <template slot="title">My menu</template>
          <template slot="body">
            <div class="section">
              <label for="selector">Select a category</label>
              <multiselect :options="categories" v-model="menu"></multiselect>
            </div>
          </template>
        </card-component>
      </div>
      <div class="col-md-4">
        <card-component>
          <template slot="title">Add Menu Item</template>
          <template slot="body">Form will come here</template>
        </card-component>
      </div>
    </div>
  </div>
</template>

<script>
import _ from "lodash";
import Multiselect from "vue-multiselect";

export default {
  props: ["items"],
  components: {
    Multiselect
  },

  created() {
    _.forEach(this.items, (item, key) => {
      this.categories.push(key);
    });
    this.menu = this.categories[0];
  },

  data() {
    return {
      menu: "",
      categories: []
    };
  }
};
</script>
