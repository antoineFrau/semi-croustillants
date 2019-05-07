<template>
    <b-card :title="title" :img-src="imgUrl" img-alt="Image" img-top>
      <b-card-text>
        {{category}}
      </b-card-text>
      <b-card-text class="small text-muted text-right">Sponsorisé</b-card-text>
    </b-card>
</template>

<script>
	/* eslint-disable */
  export default {
    props: ["title", "category", "imgUrl"],
  }
</script>
<style lang="scss" scoped>

</style>