import Vue from 'vue'
import Router from 'vue-router'
import Index from './views/Index.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    // 首页底部
    {
      path: '/',
      component: Index,
      children:[
        {
          path: '/',
          name: 'index',
          component:()=>import("./views/index/index.vue")
        },
        {
          path: '/orders',
          name: 'orders',
          meta: {
            needLogin: true
          },
          component: () => import("./views/index/orders.vue")
        }, {
          path: '/home_page',
          name: 'home_page',
          meta: {
            needLogin: true
          },
          component: () => import("./views/index/home_page.vue")
        }, {
          path: '/hcat_list',
          name: 'hcat_list',
          meta: {
            needLogin: true
          },
          component: () => import("./views/index/hcat_list.vue")
        }
      ]
    },
    // 设置
    {
      path: '/set',
      name: 'set',
      meta: {
        needLogin: true
      },
      component: () => import("./views/my/set.vue")
    },
    // 登录
    {
      path: '/logon',
      name: 'logon',
      component: () => import("./views/log_reg/logon.vue")
    },
    // 注册
    {
      path: '/register',
      name: 'register',
      component: () => import("./views/log_reg/register.vue")
    },
    // info
    {
      path: '/info',
      name: 'info',
      meta: {
        needLogin: true
      },
      component: () => import("./views/my/info.vue")
    },
    // 我的行程
    {
      path: '/my_trip',
      name: 'my_trip',
      meta: {
        needLogin: true
      },
      component: () => import("./views/my/my_trip.vue"),
      // tab栏 
      children:[
        // 未开始
        {
          path: 'tripBegin',
          name: 'tripBegin',
          meta: {
            needLogin: true
          },
          component: () => import("./views/my_trip/tripBegin.vue")
        },
        // 未支付
        {
          path: '',
          name: 'tripAll',
          meta: {
            needLogin: true
          },
          component: () => import("./views/my_trip/tripAll.vue")
        },
        // 已结束行程
        {
          path: 'tripEnd',
          name: 'tripEnd',
          meta: {
            needLogin: true
          },
          component: () => import("./views/my_trip/tripEnd.vue")
        },
        // 行程-评论
        {
          path: 'tripComment',
          name: 'tripComment',
          meta: {
            needLogin: true
          },
          component: () => import("./views/my_trip/tripComment.vue")
        }
      ]
    },
    // 订单-未开始
    {
      path: '/orderBegin',
      name: 'orderBegin',
      meta: {
        needLogin: true
      },
      component: () => import("./views/order/order_begin.vue")
    },
    // 订单-已结束
    {
      path: '/orderEnd',
      name: 'orderEnd',
      meta: {
        needLogin: true
      },
      component: () => import("./views/order/order_finish.vue")
    },
    // 订单-未支付
    {
      path: '/orderWei',
      name: 'orderWei',
      meta: {
        needLogin: true
      },
      component: () => import("./views/order/order_wei.vue")
    },
    // 订单-待评论
    {
      path: '/orderComment',
      name: 'orderComment',
      meta: {
        needLogin: true
      },
      component: () => import("./views/order/order_comment.vue")
    },
    // 评论
    {
      path: '/Comment',
      name: 'Comment',
      meta: {
        needLogin: true
      },
      component: () => import("./views/order/comment.vue")
    },
    // 优惠卷
    {
      path: '/ticket',
      name: 'ticket',
      meta: {
        needLogin: true
      },
      component: () => import("./views/my/ticket.vue"),
      children:[
        // 未使用
        {
          path: '',
          name: 'ticket_record',
          meta: {
            needLogin: true
          },
          component: () => import("./views/ticket/record.vue"),
        },
        // 使用记录
        {
          path: 'ticket_unpaid',
          name: 'ticket_unpaid',
          meta: {
            needLogin: true
          },
          component: () => import("./views/ticket/unpaid.vue"),
        },
        // 已过期
        {
          path: 'ticket_overdue',
          name: 'ticket_overdue',
          meta: {
            needLogin: true
          },
          component: () => import("./views/ticket/overdue.vue"),
        },
      ]
    },
    // 私聊
    {
      path: '/chat',
      name: 'chat',
      meta: {
        needLogin: true
      },
      component: () => import("./views/guide/chat.vue")
    },
    // 选择导游
    {
      path: '/guide_select',
      name: 'guide_select',
      meta: {
        needLogin: true
      },
      component: () => import("./views/guide/guide_select.vue")
    },
    // 导游信息
    {
      path: '/guide_verify',
      name: 'guide_verify',
      meta: {
        needLogin: true
      },
      component: () => import("./views/guide/guide_verify.vue")
    },
    // 导游info
    {
      path: '/guide_info',
      name: 'guide_info',
      meta: {
        needLogin: true
      },
      component: () => import("./views/guide/guide_info.vue")
    },
    // 导游
    {
      path: '/guide',
      name: 'guide',
      component: () => import("./views/guide/guide.vue")
    },
    // 订单
    {
      path: '/order_verify',
      name: 'order_verify',
      meta: {
        needLogin: true
      },
      component: () => import("./views/order/order_verify.vue")
    },
    // 支付
    {
      path: '/pay',
      name: 'pay',
      meta: {
        needLogin: true
      },
      component: () => import("./views/pay/pay.vue")
    },
    // 支付成功
    {
      path: '/pay_success',
      name: 'pay_success',
      meta: {
        needLogin: true
      },
      component: () => import("./views/pay/pay_success.vue")
    },
    // article
    {
      path: '/article',
      name: 'article',
      component: () => import("./views/article/article.vue")
    },
    // search
    {
      path: '/search',
      name: 'search',
      component: () => import("./views/search.vue")
    },
  ]
})
