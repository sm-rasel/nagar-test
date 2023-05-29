<template>
  <div>
    <h2>This is About Page</h2>
    <ul>
    <li
      v-for="product in applicants"
      :key="product.id">
      {{ product.title }}
      <br>
      <button>
        Add to cart
      </button>
    </li>
  </ul>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  computed: mapState({
    applicants: state => state.applicants.applicantList
  }),
  methods: {
  },
  created () {
    this.$store.dispatch('applicants/getAllApplicants')
  }
}
</script>