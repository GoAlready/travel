<template>
    <div>
        <header class="page-header">
        <router-link to="/home_page" class="page-return">
            <img src="../../assets/img/return.png" alt="" class="return">
        </router-link>
        <span class="page-name">优惠券</span>
        </header>
        <section class="ticket-nav">
            <router-link to="/ticket">
                <span :class="[{'trip-nav-active' :$route.name=='ticket_record'}, 'ticket-nav-sub']" data-toggle="ticketNew">未使用</span>
            </router-link>
            <router-link to="/ticket/ticket_unpaid">
                <span :class="[{'trip-nav-active' :$route.name=='ticket_unpaid'}, 'ticket-nav-sub']" data-toggle="ticketLog">使用记录（6）</span>
            </router-link>
            <router-link to="/ticket/ticket_overdue">
                <span :class="[{'trip-nav-active' :$route.name=='ticket_overdue'}, 'ticket-nav-sub']" data-toggle="ticketUsed">已过期（15）</span>
            </router-link>
        </section>
        <div class="mb-bg"></div>
            <router-view></router-view>
    </div>
</template>
<script>
export default {
    
}
</script>

