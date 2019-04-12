<template>
  <div class="resto-group__wrapper mb-5">
    <div class="row">
      <div class="col-md-4 mb-4" v-for="resto in localResto" :key="resto.id">
        <card-component>
          <template slot="title">{{resto.name}}</template>
          <template slot="body">
            <i class="fa fa-map-marker-alt"></i>
            {{resto.location}}
            <br>
            <a class="card-link" v-bind:href="resto.slug">Menu</a>
            <a class="card-link" v-bind:href="resto.ordersSlug">Orders</a>
          </template>
        </card-component>
      </div>
      <div class="col-md-4" v-if="showAddForm">
        <card-component>
          <template slot="title">Add new Restaurant</template>
          <template slot="body">
            <span @click="handleAddNewResto">
              <i class="fa fa-plus-circle fa-5x pointer">+</i>
            </span>
          </template>
        </card-component>
        <modal name="add-new-resto" height="55%">
          <div class="container-padding">
            <RestoAddForm @addRestoEvent="handleSaveResto" @modalCancel="handleCancelResto"></RestoAddForm>
          </div>
        </modal>
      </div>
    </div>
  </div>
</template>



<script>
import RestoAddForm from "./RestoAddForm.vue";
import axios from "axios";
export default {
  components: {
    RestoAddForm
  },

  props: ["restos"],

  created() {
    // console.log("this.restos.length", this.restos.length);
    this.localResto = this.restos;
  },

  computed: {
    showAddForm() {
      return this.localResto.length < 5 ? true : false;
    }
  },

  data() {
    return {
      localResto: []
    };
  },

  methods: {
    handleAddNewResto() {
      this.$modal.show("add-new-resto");
    },
    handleCancelResto() {
      this.$modal.hide("add-new-resto");
    },
    handleSaveResto(restoData) {
      console.log("restoData", restoData);
      axios.post("/api/resto", restoData).then(response => {
        // console.log("response", response.data);
        this.localResto.unshift(response.data);
        this.$modal.hide("add-new-resto");
      });
    }
  }
};
</script>



<style lang="scss" scoped>
.add-button-wrapper {
  text-align: center;
}
.content-container {
  height: 70px;
}
</style>

</style> 