<template>
    <div>
            <header class="search-header">
        <div class="search-container">
            <img src="../assets/img/search_blank.png" alt="">
            <input type="text" class="search-input" placeholder="搜索目的地/向导号">
        </div>
        <router-link to="/">取消</router-link>
    </header>
    <section>
        <div class="search-title">
            <span>搜索历史</span>
            <img src="../assets/img/recycle.png" alt="">
        </div>
        <div class="search-wrap">
            <span>香港</span>
            <span>香港</span>
            <span>哈尔滨</span>
            <span>香格里拉</span>
        </div>
    </section>
    <section>
        <div class="search-title">
            <span>热门城市</span>
        </div>
        <div class="search-wrap">
            <span>香港</span>
            <span>香港</span>
            <span>哈尔滨</span>
            <span>香格里拉</span>
            <span>香港</span>
            <span>香港</span>
            <span>哈尔滨</span>
            <span>香格里拉</span>
            <span>香港</span>
            <span>香港</span>
            <span>哈尔滨</span>
            <span>香格里拉</span>
        </div>
    </section>
    </div>
</template>
<script>
 $(function () {
        var spans = $(".search-wrap span");
        var input = $(".search-input");

        spans.on("click", function () {
           var text = $(this).text();
            input.val(text);
        });
    })
export default {
    
}
</script>
