<template>
  <div class="versions-wrap">
    <a class="versions-box" :href="link(version)" v-for="version in versions">
        {{ version }}
    </a>
  </div>
</template>

<script>
export default {
    props: {
        versions: null
    },

    methods: {
        link(version) {
            version = version.toString().toLowerCase()

            if(version == 'latest' || version == 'master' || version == 'current') {
                version = ''
            } else {
                version = version + '/'
            }

            return this.$page.path.replace(/(\/)([^\/]+\.html)?$/, '') + '/' + version 
        }
    }
}
</script>

<style>
.versions-wrap {
    margin:0 auto;
    width: 50%;
}
.versions-box{
    display: block;
    border: 1px #ccc solid;
    margin-bottom:10px;
    padding:5px;
    font-size: 30px;
    text-align: center;
    border-radius: 5px
}
.versions-box:hover{
    background-color: #DBDBDB;
}
</style>