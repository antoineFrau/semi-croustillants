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
            :content="p.contents"
            :author="p.user.lastname"
            :imgSrc="'/storage/'+p.image_url"
            :imgAuthor="'/storage/'+p.user.profile_image_url"
            :date="p.date" >
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
  async beforeMount() {
      this.options.headers.Authorization = 'Bearer '+this.$store.getters.getUserToken
      await this.isUserLoggin()
      this.getPostData()
  },
  props: {
    msg: String
  },
  components: {
    "post-component": PostComponent,
    "add-post-component": AddPostComponent,
    "ad-component": AdComponent,
    "afinity-list-component": AfinityListComponent
  },
  methods: {
    isUserLoggin: async function() {
      var isConnected = await this.$store.dispatch('isConnected', this.options)
      if(!isConnected){
        window.location.href = '/login'
      }
    },
    getPostData: function(){
      window.axios.post('http://localhost:8000/api/posts', {}, this.options)
        .then(response => {
            this.posts = response.data.posts
        }).catch(error => {
            console.log(error)
        })
    }
  },
  data: () => ({
    options: {
      data: {},
      headers: {
        'Authorization': ''
			},
    },
    posts: []
  })
}
</script>


