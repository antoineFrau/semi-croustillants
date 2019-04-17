<template>
  <div class="container-fluid gedf-wrapper">
    <div class="row">
        <div class="col-md-3">
            <afinity-list-component></afinity-list-component>
        </div>
        <div class="col-md-6 gedf-main">
          <add-post-component  class="mb-4"></add-post-component>
          <div v-for="p in posts" :key="p.id">
            <post-component class="mb-4"
            :content="p.content"
            :author="p.author"
            :imgSrc="p.imgSrc"
            :imgAuthor="p.imgAuthor" >
            </post-component>
          </div>
        </div>
        <div class="col-md-3">
          <ad-component  class="mb-4" title="TIblLABLBALTRE" category="Sport" img-url="https://picsum.photos/500/350/?random"></ad-component>
          <ad-component  class="mb-4" title="BLALBLALALA" category="Ecologie" img-url="https://source.unsplash.com/random/500x350"></ad-component>
        </div>
      </div>
  </div>
</template>

<script>
import PostComponent from '../components/PostComponent.vue'
import AddPostComponent from '../components/AddPostComponent.vue'
import AdComponent from '../components/AdComponent.vue'
import AfinityListComponent from '../components/AfinityListComponent.vue'
export default {
  name: 'Main',
  props: {
    msg: String
  },
  components: {
    "post-component": PostComponent,
    "add-post-component": AddPostComponent,
    "ad-component": AdComponent,
    "afinity-list-component": AfinityListComponent
  },
  data: () => ({
    posts: [
      {
        "id":1,
        "author": "Jeremy Varesi",
        "imgAuthor": "https://picsum.photos/50/50",
        "imgSrc": "https://source.unsplash.com/random/500x350",
        "content": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates."
      },
      {
        "id":2,
        "author": "Camille Rubio",
        "imgAuthor": "https://picsum.photos/50/50",
        "imgSrc": "https://source.unsplash.com/random/500x350",
        "content": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates."
      },
      {
        "id":3,
        "author": "Chris LeCrack",
        "imgAuthor": "https://picsum.photos/50/50",
        "imgSrc": "https://source.unsplash.com/random/500x350",
        "content": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates."
      },
      {
        "id":4,
        "author": "Antoine Frau",
        "imgAuthor": "https://picsum.photos/50/50",
        "imgSrc": "https://source.unsplash.com/random/500x350",
        "content": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates."
      }
    ]
  })
}
</script>


