<template>
  <div>
    <div v-if="loading">Loading...</div>
    <div v-else>
      <div v-if="alreadyReviewed">
        <h3>You've already review left a review for this booking!</h3>
      </div>
      <div v-else>
        <!-- Star Rating -->
        <div class="form-group">
          <label class="text-muted">Select the star rating (1 is worst - 5 is best)</label>
          <star-rating class="fa-3x" v-model="review.rating"></star-rating>
        </div>

        <!-- Description -->
        <div class="form-group">
          <label for="content" class="text-muted">Describe your experience with</label>
          <textarea name="content" id="" cols="30" rows="10" class="form-control" v-model="review.content"></textarea>
        </div>

        <!-- Button -->
        <button class="btn btn-lg btn-primary btn-block">Submit</button>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  export default {
    data() {
      return {
        review: {
          rating: 5,
          content: null,
        },
        existingReview: null,
        loading: false,
      };
    },
    created() {
      this.loading = true;

      // 1. If review already exists
      // console.log(response.data.data);
      axios
        .get(`/api/reviews/${this.$route.params.id}`)
        .then(response => (this.existingReview = response.data.data))
        .catch(err => {})
        .then(() => (this.loading = false));
      // 2. Fetch a booking by review key
      // 3. Store the review
    },
    computed: {
      alreadyReviewed() {
        return this.existingReview !== null;
      },
    },
  };
</script>

<style></style>
