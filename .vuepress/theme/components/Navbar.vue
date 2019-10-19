<template>
  <parent-navbar />
</template>

<script>
import ParentNavbar from "@parent-theme/components/Navbar.vue";

export default {
  components: {
    "parent-navbar": ParentNavbar
  },

  created() {
    let versions = this.$page.frontmatter.versions || null;

    if (/\opensource\/.+/.test(this.$page.regularPath)) {
      //get current version from link
      let m = /\/([0-9\.]{1,3})\//.exec(this.$page.regularPath);
      let currentVersion = m !== null ? m[1] || "master" : "master";

      const currentLink = this.$page.path.replace(/(\/)([^\/]+\.html)?$/, "");
      this.$site.themeConfig.nav = this.$site.themeConfig.nav || [];
      if(! this.objectPropInArray(this.$site.themeConfig.nav, 'ariaLabel', 'Docs Versions')) {
      this.$site.themeConfig.nav.push({
        text: currentVersion,
        ariaLabel: "Docs Versions",
        items: [
          {
            text: "Different Versions",
            link: (currentVersion !== 'master' ? currentLink.replace('/'+currentVersion, '') : currentLink) + "/docs-versions.html"
          }
        ]
      });
      }
    }
  },

  methods: {
      objectPropInArray(list, prop, val) {
        if (list.length > 0) {
        for (let i = 0; i < list.length; i++) {
            if (list[i] && list[i][prop] && list[i][prop] === val) {
              return true;
            }
          }
        }
        return false;
      }
  }
};
</script>