<template>
  <div class="card gedf-card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mr-2">
                    <img class="rounded-circle" width="45" :src="imgAuthor" alt="">
                </div>
                <div class="ml-2">
                    <div class="h5 m-0">@{{(author.replace(/\s/g, '')).toLowerCase()}}</div>
                    <div class="h7 text-muted">{{author}}</div>
                </div>
            </div>
            <stars-rating-component 
            v-model="rating"  
            :showRating="false"
            :star-size="15" 
            :round-start-rating="true"
            @rating-selected ="setRating" ></stars-rating-component>
        </div>

    </div>
    <img class="card-img-top" :src="imgSrc" alt="Card image cap">
    <div class="card-body">
        <div class="text-muted h7 mb-2"> <i class="far fa-clock"></i> {{date}}</div>

        <p class="card-text">
            {{content}}
        </p>
    </div>
</div>
</template>


<script>
import StarsRating from './StarsRatingComponent.vue'
export default {
  components: {
    "stars-rating-component": StarsRating
  },
  methods: {
    setRating: function(rating) {
        console.log(rating)
    },
  },
  data: () => ({
    rating: 0
  }),
  props: {
    content: String,
    author: String,
    imgSrc: String,
    imgAuthor: String,
    starRating: Number,
    date: String
  },
}
</script>


<style scoped>
 @media (min-width: 992px) {
    .gedf-main {
        padding-left: 4rem;
        padding-right: 4rem;
    }
    .gedf-card {
        margin-bottom: 2.77rem;
    }
}
</style>
