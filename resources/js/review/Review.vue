<template>
  <div>
    <!-- Star Rating -->
    <div class="form-group">
      <label class="text-muted">Select the star rating (1 is worst - 5 is best)</label>
      <star-rating :rating="5" class="fa-3x"></star-rating>
    </div>

    <!-- Description -->
    <div class="form-group">
      <label for="content" class="text-muted">Describe your experience with</label>
      <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <!-- Button -->
    <button class="btn btn-lg btn-primary btn-block">Submit</button>
  </div>
</template>

<script>
  export default {};
</script>

<style></style>
