export default{
 	state: {
    blog:[],
  },
 getters:{
    
    getBlogPost(state){
      return state.blog;
    },
},
 actions:{
showSearchPost(context,payload){
       axios.get('/search?s='+payload)
       .then((response)=>{context.commit('searchPosts',response.data.searchPosts)})
    },
},
 mutations: {
    blogs(state,data) {
      return state.blog=data;
    },
  },
 }
 <template>
    <span id="sidebar">
        <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input @keyup="RealSearch" placeholder="Type something" v-model="keyword" type="text" class="input-medium search-query">
                  <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">

                  <li v-for="category in allcategories"><i class="icon-angle-right"></i><router-link :to="`/blog/post/${category.id}`">{{category.name}}</router-link><span> (20)</span></li>

                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">

                  <li v-for="(post,index) in latestpost"  v-if="index<5">
                    <img :src="post.image1" class="pull-left" alt="" width="40" height="40"/>
                    <h6><router-link :to="`/single/product/${post.id}`">{{post.name}}</router-link></h6>
                    <p>
                     {{post.detail}}
                    </p>
                  </li>

                </ul>
              </div>

            </aside>
          </div>
    </span>
</template>

<script>
   import _ from 'lodash'
    export default {
        name: "BlogSidebar",
        data(){
           return {
               keyword:''
           }
        },
        computed:{
            allcategories(){
                return this.$store.getters.getCategory;
            },
            latestpost(){
                return this.$store.getters.getLatestPost
            }
        },
        mounted(){
            this.$store.dispatch('showLatestPost');
            this.$store.dispatch('showCategories')
        },
        methods:{
            RealSearch:_.debounce(function () {
                this.$store.dispatch('showSearchPost',this.keyword);
            },1000)
        }
    };
</script>

<style scoped>
</style>

<template>
  <span id="blogpost">
         <!-- end header -->
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Blog left sidebar</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active">Blog with left sidebar</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">

            <article v-for="post in blogpost">
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{post.name}}</a></h3>
                    </div>
                    <img :src="post.image1" alt="" />
                  </div>
                  <p>
                   {{post.detail|shortlength(200,'...')}}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#"> {{post.created_at|timeformat}}</a></li>
                      <li v-if="post.user"><i class="icon-user"></i><a href="#">{{post.user.name}}</a></li>
                      <li v-if="post.category_id"><i class="icon-folder-open"></i><a href="#"> {{post.category.name}}</a></li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    <router-link :to="`/single/product/${post.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                  </div>
                </div>
              </div>
            </article>

            <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
          </div>
          <BlogSidebar/>
        </div>
      </div>
    </section>
  </span>
</template>

<script>
    import BlogSidebar from "./BlogSidebar.vue"
    export default {
        name: "BlogPost",
        components:{
            BlogSidebar
        },
        computed:{
            blogpost(){
                return this.$store.getters.getBlogPost
            }
        },
        methods:{
            getAllCategoryPost(){
                if(this.$route.params.id!=null){
                    this.$store.dispatch('showBlogPostByCatId',this.$route.params.id);
                }else{
                    this.$store.dispatch('showBlogPost');
                }

            }
        },
        mounted(){
            this.getAllCategoryPost();
            
        },
        watch:{
            $route(to,from){
                this.getAllCategoryPost();
            }
        }
    };
</script>

<style scoped>
</style>
Route::get('/search','Layout\FrontController@searchPost');
 public function searchPost()
    {
        // dd($keyword);
        $search = \Request::get('s');
       $categories=Product::with('user','category')->where('name','LIKE','%'.$search.'%')->get();
        return response()->json(['searchPosts'=>$categories],200);
    }