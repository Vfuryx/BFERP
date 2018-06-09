import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

/* Layout */
import Layout from '../views/layout/Layout.vue';

const constantRouterMap = [
    {
        name: 'Login',
        path: '/login',
        component: resolve => void(require(['../views/login/index.vue'], resolve))
    },
    {
        name: 'NoPage',
        path: '/404',
        component: resolve => void(require(['../views/404.vue'], resolve))
    },
    {
        name: 'Layout',
        path: '/',
        component: Layout,
        redirect: '/dashboard',
        hidden: true,
        children:[
            {
                path: 'dashboard',
                component: resolve => void(require(['../views/dashboard/index.vue'], resolve))
            }
        ]
    },
    {
        name: 'Order',
        path: '/order',
        component: Layout,
        redirect: '/order/customerService',
        meta: { title: '订单管理', icon: 'order' },
        children: [
            {
                path: 'customerService',
                name: 'CustomerService',
                component: resolve => void(require(['../views/order/customerService.vue'],resolve)),
                meta: { title: '客服部', icon: 'customer' }
            },
            {
                path: 'merchandiser',
                name: 'Merchandiser',
                component: resolve => void(require(['../views/order/merchandiser.vue'],resolve)),
                meta: { title: '跟单部', icon: 'move' }
            },
            {
                path: 'financialDepart',
                name: 'FinancialDepart',
                component: resolve => void(require(['../views/order/financialDepart.vue'],resolve)),
                meta: { title: '财务部', icon: 'financial' }
            },
            {
                path: 'storage',
                name: 'Storage',
                component: resolve => void(require(['../views/order/storage.vue'],resolve)),
                meta: { title: '仓储部', icon: 'store' }
            },
            {
                path: 'orderChanges',
                name: 'OrderChanges',
                component: resolve => void(require(['../views/order/orderChanges.vue'],resolve)),
                meta: { title: '订单变更', icon: 'chg' }
            },
            {
                path: 'orderCenter',
                name: 'OrderCenter',
                component: resolve => void(require(['../views/order/orderCenter.vue'],resolve)),
                meta: { title: '订单中心', icon: 'ordCenter' }
            },
            {
                path: 'redPackageDelivery',
                name: 'RedPackageDelivery',
                component: resolve => void(require(['../views/order/redPackageDelivery.vue'],resolve)),
                meta: { title: '红包商品配送', icon: 'reddeli' }
            },
            {
                path: 'audit',
                name: 'Audit',
                component: resolve => void(require(['../views/order/audit.vue'],resolve)),
                meta: { title: '审计部', icon: 'audit' }
            },
            {
                path: 'auditOfFinancialBrushes',
                name: 'AuditOfFinancialBrushes',
                component: resolve => void(require(['../views/order/auditOfFinancialBrushes.vue'],resolve)),
                meta: { title: '财务刷单审核', icon: 'fiRea' }
            },
            {
                path: 'logisticsQueryOrder',
                name: 'LogisticsQueryOrder',
                component: resolve => void(require(['../views/order/logisticsQueryOrder.vue'],resolve)),
                meta: { title: '物流查询订单', icon: 'query' }
            },
            {
                path: 'orderTracking',
                name: 'OrderTracking',
                component: resolve => void(require(['../views/order/orderTracking.vue'],resolve)),
                meta: { title: '订单跟踪', icon: 'track' }
            },
            {
                path: 'orderSettlement',
                name: 'OrderSettlement',
                component: resolve => void(require(['../views/order/orderSettlement.vue'],resolve)),
                meta: { title: '订单结算', icon: 'settle' }
            }
        ]
    },
    {
        name: 'CRMCustomer',
        path: '/CRMCustomer',
        component: Layout,
        redirect: '/CRMCustomer/customerManagement',
        meta: { title: 'CRM客户管理', icon: 'cus' },
        children: [
            {
                path: 'customerMag',
                name: 'CustomerMag',
                component: resolve => void(require(['../views/CRMCustomer/customerMag.vue'],resolve)),
                meta: { title: '客户管理', icon: 'cusMag' }
            },
            {
                path: 'SMSTemplate',
                name: 'SMSTemplate',
                component: resolve => void(require(['../views/CRMCustomer/SMSTemplate.vue'],resolve)),
                meta: { title: '短信模板', icon: 'ordMsg' }
            },
            {
                path: 'customerLevel',
                name: 'CustomerLevel',
                component: resolve => void(require(['../views/CRMCustomer/customerLevel.vue'],resolve)),
                meta: { title: '客户等级', icon: 'cusLevel' }
            },
            {
                path: 'indexOfConsumption',
                name: 'IndexOfConsumption',
                component: resolve => void(require(['../views/CRMCustomer/indexOfConsumption.vue'],resolve)),
                meta: { title: '消费指数', icon: 'indexConsum' }
            },
            {
                path: 'intentionalCustomers',
                name: 'IntentionalCustomers',
                component: resolve => void(require(['../views/CRMCustomer/intentionalCustomers.vue'],resolve)),
                meta: { title: '意向客户', icon: 'intenCus' }
            }
        ]
    },
    {
        name: 'Financial',
        path: '/financial',
        component: Layout,
        redirect: '/financial/financialAccount',
        meta: { title: '财务管理', icon: 'finmag' },
        children: [
            {
                path: 'financialAccount',
                name: 'FinancialAccount',
                component: resolve => void(require(['../views/financial/financialAccount.vue'],resolve)),
                meta: { title: '财务记账', icon: 'fiAc' }
            },
            {
                path: 'accountCenter',
                name: 'AccountCenter',
                component: resolve => void(require(['../views/financial/accountCenter.vue'],resolve)),
                meta: { title: '记账中心', icon: 'asLa' }
            },
            {
                path: 'financialBill',
                name: 'FinancialBill',
                component: resolve => void(require(['../views/financial/financialBill.vue'],resolve)),
                meta: { title: '财务开票', icon: 'borrow' }
            }
        ]
    },
    {
        name: 'ReturnVisit',
        path: '/returnVisit',
        component: Layout,
        redirect: '/returnVisit/afterSalesVisit',
        meta: { title: '回访管理', icon: 'revisit' },
        children: [
            {
                path: 'afterSalesVisit',
                name: 'AfterSalesVisit',
                component: resolve => void(require(['../views/returnVisit/afterSalesVisit.vue'],resolve)),
                meta: { title: '售后回访', icon: 'afterS' }
            },
            {
                path: 'evaluationManagement',
                name: 'EvaluationManagement',
                component: resolve => void(require(['../views/returnVisit/evaluationManagement.vue'],resolve)),
                meta: { title: '评价管理', icon: 'evalua' }
            },
            {
                path: 'financialConfirmation',
                name: 'FinancialConfirmation',
                component: resolve => void(require(['../views/returnVisit/financialConfirmation.vue'],resolve)),
                meta: { title: '财务确认', icon: 'financial' }
            }
        ]
    },
    {
        name: 'Purchase',
        path: '/purchase',
        component: Layout,
        redirect: '/purchase/purchaseOrder',
        meta: { title: '采购管理', icon: 'purchase' },
        children: [
            {
                path: 'purchaseOrder',
                name: 'PurchaseOrder',
                component: resolve => void(require(['../views/purchase/purchaseOrder.vue'],resolve)),
                meta: { title: '采购单管理', icon: 'puOr' }
            },
            {
                path: 'stockIn',
                name: 'StockIn',
                component: resolve => void(require(['../views/purchase/stockIn.vue'],resolve)),
                meta: { title: '入库单管理', icon: 'stIn' }
            },
            {
                path: 'cancelPurchase',
                name: 'CancelPurchase',
                component: resolve => void(require(['../views/purchase/cancelPurchase.vue'],resolve)),
                meta: { title: '取消采购管理', icon: 'canPu' }
            },
            {
                path: 'purchaseReturns',
                name: 'PurchaseReturns',
                component: resolve => void(require(['../views/purchase/purchaseReturns.vue'],resolve)),
                meta: { title: '采购退货管理', icon: 'regoods' }
            },
            {
                path: 'purchaseFabric',
                name: 'PurchaseFabric',
                component: resolve => void(require(['../views/purchase/purchaseFabric.vue'],resolve)),
                meta: { title: '采购面料管理', icon: 'puFa' }
            },
            {
                path: 'otherStorage',
                name: 'OtherStorage',
                component: resolve => void(require(['../views/purchase/otherStorage.vue'],resolve)),
                meta: { title: '其他入库', icon: 'otSt' }
            }
        ]
    },
    {
        name: 'ReturnGoods',
        path: '/returnGoods',
        component: Layout,
        redirect: '/returnGoods/customerReApplication',
        meta: { title: '退货管理', icon: 'regoods' },
        children: [
            {
                path: 'customerReApplication',
                name: 'CustomerReturnApplication',
                component: resolve => void(require(['../views/returnGoods/customerReApplication.vue'],resolve)),
                meta: { title: '客服退货申请', icon: 'customer' }
            },
            {
                path: 'afterSaleReview',
                name: 'AfterSaleReview',
                component: resolve => void(require(['../views/returnGoods/afterSaleReview.vue'],resolve)),
                meta: { title: '售后退货审核', icon: 'cusRe' }
            },
            {
                path: 'warehouseReReview',
                name: 'WarehouseReReview',
                component: resolve => void(require(['../views/returnGoods/warehouseReReview.vue'],resolve)),
                meta: { title: '仓储退货审核', icon: 'waRe' }
            },
            {
                path: 'purchaseInSync',
                name: 'PurchaseInSync',
                component: resolve => void(require(['../views/returnGoods/purchaseInSync.vue'],resolve)),
                meta: { title: '采购库存同步', icon: 'sync' }
            },
            {
                path: 'returnMngCenter',
                name: 'ReturnMngCenter',
                component: resolve => void(require(['../views/returnGoods/returnMngCenter.vue'],resolve)),
                meta: { title: '退货管理中心', icon: 'reCt' }
            }
        ]
    },
    {
        name: 'Refund',
        path: '/refund',
        component: Layout,
        redirect: '/refund/customerReApplication',
        meta: { title: '退款管理', icon: 'remoney' },
        children: [
            {
                path: 'customerReApplication',
                name: 'CustomerReApplication',
                component: resolve => void(require(['../views/refund/customerReApplication.vue'],resolve)),
                meta: { title: '客服退款申请', icon: 'customer' }
            },
            {
                path: 'afterSaleReAudit',
                name: 'AfterSaleReAudit',
                component: resolve => void(require(['../views/refund/afterSaleReAudit.vue'],resolve)),
                meta: { title: '售后退款审核', icon: 'afterS' }
            },
            {
                path: 'financialReAudit',
                name: 'FinancialReAudit',
                component: resolve => void(require(['../views/refund/financialReAudit.vue'],resolve)),
                meta: { title: '财务退款审核', icon: 'fiRea' }
            },
            {
                path: 'refundCenter',
                name: 'RefundCenter',
                component: resolve => void(require(['../views/refund/refundCenter.vue'],resolve)),
                meta: { title: '退款中心', icon: 'reCt' }
            },
            {
                path: 'auditProofread',
                name: 'AuditProofread',
                component: resolve => void(require(['../views/refund/auditProofread.vue'],resolve)),
                meta: { title: '审核校对', icon: 'sync' }
            }
        ]
    },
    {
        name: 'Stock',
        path: '/stock',
        component: Layout,
        redirect: '/stock/inventoryInquire',
        meta: { title: '库存管理', icon: 'stock' },
        children: [
            {
                path: 'inventoryInquire',
                name: 'InventoryInquire',
                component: resolve => void(require(['../views/stock/inventoryInquire.vue'],resolve)),
                meta: { title: '库存查询', icon: 'query' }
            },
            {
                path: 'inventoryMove',
                name: 'InventoryMove',
                component: resolve => void(require(['../views/stock/inventoryMove.vue'],resolve)),
                meta: { title: '库存移动', icon: 'move' }
            },
            {
                path: 'portfolioInventory',
                name: 'PortfolioInventory',
                component: resolve => void(require(['../views/stock/portfolioInventory.vue'],resolve)),
                meta: { title: '组合商品库存', icon: 'poFo' }
            },
            {
                path: 'inventoryAdjust',
                name: 'InventoryAdjust',
                component: resolve => void(require(['../views/stock/inventoryAdjust.vue'],resolve)),
                meta: { title: '库存调整', icon: 'sync' }
            },
            {
                path: 'inventoryCheck',
                name: 'InventoryCheck',
                component: resolve => void(require(['../views/stock/inventoryCheck.vue'],resolve)),
                meta: { title: '库存盘点', icon: 'check' }
            },
            {
                path: 'borrowOrderMag',
                name: 'BorrowOrderMag',
                component: resolve => void(require(['../views/stock/borrowOrderMag.vue'],resolve)),
                meta: { title: '借出单管理', icon: 'borrow' }
            },
            {
                path: 'finishedProductMag',
                name: 'FinishedProductMag',
                component: resolve => void(require(['../views/stock/finishedProductMag.vue'],resolve)),
                meta: { title: '成品仓管理', icon: 'pro' }
            },
            {
                path: 'halfProDelivery',
                name: 'HalfProDelivery',
                component: resolve => void(require(['../views/stock/halfProDelivery.vue'],resolve)),
                meta: { title: '半成品出库', icon: 'hPro' }
            }
        ]
    },
    {
        name: 'DownloadCenter',
        path: '/dwnCenter',
        component: Layout,
        redirect: '/dwnCenter/orderDwn',
        meta: { title: '下载中心', icon: 'dwn' },
        children: [
            {
                path: 'orderDwn',
                name: 'OrderDownload',
                component: resolve => void(require(['../views/dwnCenter/orderDwn.vue'],resolve)),
                meta: { title: '订单下载', icon: 'dwnorder' }
            },
            {
                path: 'productDwn',
                name: 'ProductDownload',
                component: resolve => void(require(['../views/dwnCenter/productDwn.vue'],resolve)),
                meta: { title: '商品下载', icon: 'dwngoods' }
            },
            {
                path: 'refundListDwn',
                name: 'RefundListDwn',
                component: resolve => void(require(['../views/dwnCenter/refundListDwn.vue'],resolve)),
                meta: { title: '退款单下载', icon: 'remoneylist' }
            }
        ]
    },
    {
        name: 'BasicInf',
        path: '/basicInf',
        component: Layout,
        redirect: '/basicInf/goodsMag',
        meta: { title: '基础信息', icon: 'basicInf' },
        children: [
            {
                path: 'goodsMag',
                name: 'Goods',
                component: resolve => void(require(['../views/basicInf/goodsMag.vue'],resolve)),
                meta: { title: '商品管理', icon: 'proM' }
            },
            {
                path: 'logisticsMag',
                name: 'Logistics',
                component: resolve => void(require(['../views/basicInf/logisticsMag.vue'],resolve)),
                meta: { title: '物流管理', icon: 'reddeli' }
            },
            {
                path: 'warehouseMag',
                name: 'Warehouse',
                component: resolve => void(require(['../views/basicInf/warehouseMag.vue'],resolve)),
                meta: { title: '仓库管理', icon: 'store' }
            },
            {
                path: 'shopMag',
                name: 'Shop',
                component: resolve => void(require(['../views/basicInf/shopMag.vue'],resolve)),
                meta: { title: '店铺管理', icon: 'shop' }
            },
            {
                path: 'memberMag',
                name: 'Member',
                component: resolve => void(require(['../views/basicInf/memberMag.vue'],resolve)),
                meta: { title: '会员管理', icon: 'vipM' }
            },
            {
                path: 'supplierMag',
                name: 'Supplier',
                component: resolve => void(require(['../views/basicInf/supplierMag.vue'],resolve)),
                meta: { title: '供应商管理', icon: 'sup' }
            },
            {
                path: 'expenseTypeMag',
                name: 'ExpenseType',
                component: resolve => void(require(['../views/basicInf/expenseTypeMag.vue'],resolve)),
                meta: { title: '费用类型管理', icon: 'typeP' }
            },
            {
                path: 'logisticsArea',
                name: 'LogisticsArea',
                component: resolve => void(require(['../views/basicInf/logisticsArea.vue'],resolve)),
                meta: { title: '物流区域', icon: 'area' }
            },
            {
                path: 'departmentMag',
                name: 'Department',
                component: resolve => void(require(['../views/basicInf/departmentMag.vue'],resolve)),
                meta: { title: '部门管理', icon: 'cus' }
            },
            {
                path: 'markerColorMag',
                name: 'MarkerColor',
                component: resolve => void(require(['../views/basicInf/markerColorMag.vue'],resolve)),
                meta: { title: '标记颜色管理', icon: 'colorM' }
            },
            {
                path: 'proCategoryMag',
                name: 'ProCategory',
                component: resolve => void(require(['../views/basicInf/proCategoryMag.vue'],resolve)),
                meta: { title: '商品类别管理', icon: 'pType' }
            },
            {
                path: 'userAstSupplier',
                name: 'UserAstSupplier',
                component: resolve => void(require(['../views/basicInf/userAstSupplier.vue'],resolve)),
                meta: { title: '用户关联供应商', icon: 'asso' }
            },
            {
                path: 'printerConf',
                name: 'PrinterConf',
                component: resolve => void(require(['../views/basicInf/printerConf.vue'],resolve)),
                meta: { title: '打印机配置', icon: 'print' }
            },
            {
                path: 'negativeInvConf',
                name: 'NegativeInvConf',
                component: resolve => void(require(['../views/basicInf/negativeInvConf.vue'],resolve)),
                meta: { title: '负库存配置', icon: 'canPu' }
            },
            {
                path: 'userAstWarehouse',
                name: 'UserAstWarehouse',
                component: resolve => void(require(['../views/basicInf/userAstWarehouse.vue'],resolve)),
                meta: { title: '用户关联仓库', icon: 'assoW' }
            },
            {
                path: 'invoiceConf',
                name: 'InvoiceConf',
                component: resolve => void(require(['../views/basicInf/invoiceConf.vue'],resolve)),
                meta: { title: '发货单配置', icon: 'puOr' }
            },
            {
                path: 'distributeMthMag',
                name: 'DistributeMthMag',
                component: resolve => void(require(['../views/basicInf/distributeMthMag.vue'],resolve)),
                meta: { title: '配送方式管理', icon: 'delT' }
            },
            {
                path: 'ReviewConfMag',
                name: 'ReviewConfMag',
                component: resolve => void(require(['../views/basicInf/ReviewConfMag.vue'],resolve)),
                meta: { title: '复检配置管理', icon: 'sys' }
            },
            {
                path: 'distributeMag',
                name: 'DistributeMag',
                component: resolve => void(require(['../views/basicInf/distributeMag.vue'],resolve)),
                meta: { title: '配送管理', icon: 'delM' }
            },
            {
                path: 'fabricsMag',
                name: 'FabricsMag',
                component: resolve => void(require(['../views/basicInf/fabricsMag.vue'],resolve)),
                meta: { title: '面料管理', icon: 'puFa' }
            },
            {
                path: 'accountType',
                name: 'AccountType',
                component: resolve => void(require(['../views/basicInf/accountType.vue'],resolve)),
                meta: { title: '记账类型', icon: 'fiAc' }
            },
            {
                path: 'verificationConf',
                name: 'VerificationConf',
                component: resolve => void(require(['../views/basicInf/verificationConf.vue'],resolve)),
                meta: { title: '核销配置', icon: 'audit' }
            },
            {
                path: 'quantumUser',
                name: 'QuantumUser',
                component: resolve => void(require(['../views/basicInf/quantumUser.vue'],resolve)),
                meta: { title: '量子用户', icon: 'qUser' }
            },
            {
                path: 'freightType',
                name: 'FreightType',
                component: resolve => void(require(['../views/basicInf/freightType.vue'],resolve)),
                meta: { title: '运费类型', icon: 'typeP' }
            },
            {
                path: 'buyAndSendMag',
                name: 'BuyAndSendMag',
                component: resolve => void(require(['../views/basicInf/buyAndSendMag.vue'],resolve)),
                meta: { title: '买就送管理', icon: 'gift' }
            },
            {
                path: 'proBom',
                name: 'ProBom',
                component: resolve => void(require(['../views/basicInf/proBom.vue'],resolve)),
                meta: { title: '产品Bom', icon: 'pro' }
            },
            {
                path: 'relateLogistics',
                name: 'RelateLogistics',
                component: resolve => void(require(['../views/basicInf/relateLogistics.vue'],resolve)),
                meta: { title: '关联物流', icon: 'asLa' }
            },
            {
                path: 'dwnConf',
                name: 'DwnConf',
                component: resolve => void(require(['../views/basicInf/dwnConf.vue'],resolve)),
                meta: { title: '下载配置', icon: 'dwn' }
            },
            {
                path: 'proMap',
                name: 'ProMap',
                component: resolve => void(require(['../views/basicInf/proMap.vue'],resolve)),
                meta: { title: '产品映射', icon: 'map' }
            },
            {
                path: 'miniPackageMag',
                name: 'MiniPackageMag',
                component: resolve => void(require(['../views/basicInf/miniPackageMag.vue'],resolve)),
                meta: { title: '最小包管理', icon: 'min' }
            },
            {
                path: 'offlineAccountConf',
                name: 'OfflineAccountConf',
                component: resolve => void(require(['../views/basicInf/offlineAccountConf.vue'],resolve)),
                meta: { title: '线下账户配置', icon: 'cusMag' }
            },
            {
                path: 'brushLockConf',
                name: 'BrushLockConf',
                component: resolve => void(require(['../views/basicInf/brushLockConf.vue'],resolve)),
                meta: { title: '刷单锁单配置', icon: 'lock' }
            },
            {
                path: 'shopGatheringMag',
                name: 'ShopGatheringMag',
                component: resolve => void(require(['../views/basicInf/shopGatheringMag.vue'],resolve)),
                meta: { title: '门店收款管理', icon: 'geth' }
            },
            {
                path: 'afterSState',
                name: 'AfterSaleState',
                component: resolve => void(require(['../views/basicInf/afterSState.vue'],resolve)),
                meta: { title: '售后状态', icon: 'state' }
            },
            {
                path: 'afterSType',
                name: 'AfterSaleType',
                component: resolve => void(require(['../views/basicInf/afterSType.vue'],resolve)),
                meta: { title: '售后类型', icon: 'afterS' }
            },
            {
                path: 'evalCategoryMag',
                name: 'EvalCategoryMag',
                component: resolve => void(require(['../views/basicInf/evalCategoryMag.vue'],resolve)),
                meta: { title: '评价类别管理', icon: 'evalua' }
            }
        ]
    },
    {
        name: 'System',
        path: '/system',
        component: Layout,
        redirect: '/system/roleMag',
        meta: { title: '系统管理', icon: 'sys' },
        children: [
            {
                path: 'roleMag',
                name: 'RoleMag',
                component: resolve => void(require(['../views/system/roleMag.vue'],resolve)),
                meta: { title: '角色管理', icon: 'role' }
            },
            {
                path: 'userMag',
                name: 'UserMag',
                component: resolve => void(require(['../views/system/userMag.vue'],resolve)),
                meta: { title: '用户管理', icon: 'cus' }
            },
            {
                path: 'roleAssociateUser',
                name: 'RoleAssociateUser',
                component: resolve => void(require(['../views/system/roleAssociateUser.vue'],resolve)),
                meta: { title: '角色用户关联', icon: 'asso' }
            }
        ]
    },
    {
        name: 'ReportStatistics',
        path: '/reportStatistics',
        component: Layout,
        redirect: '/reportStatistics/saleStat1',
        meta: { title: '报表统计', icon: 'report' },
        children: [
            {
                path: 'saleStat1',
                name: 'SaleStatistics1.0',
                component: resolve => void(require(['../views/reportStatistics/saleStat1.vue'],resolve)),
                meta: { title: '销售统计报表1.0', icon: 'sS1' }
            },
            {
                path: 'saleStat2',
                name: 'SaleStatistics2.0',
                component: resolve => void(require(['../views/reportStatistics/saleStat2.vue'],resolve)),
                meta: { title: '销售统计报表2.0', icon: 'sS2' }
            },
            {
                path: 'saleStat3',
                name: 'SaleStatistics3.0',
                component: resolve => void(require(['../views/reportStatistics/saleStat3.vue'],resolve)),
                meta: { title: '销售统计报表3.0', icon: 'sS3' }
            },
            {
                path: 'shipStat',
                name: 'ShipStatistics',
                component: resolve => void(require(['../views/reportStatistics/shipStat.vue'],resolve)),
                meta: { title: '发货统计报表', icon: 'shS' }
            },
            {
                path: 'purchaseStat',
                name: 'PurchaseStatistics',
                component: resolve => void(require(['../views/reportStatistics/purchaseStat.vue'],resolve)),
                meta: { title: '采购统计报表', icon: 'pS' }
            },
            {
                path: 'financeStat',
                name: 'FinanceStatistics',
                component: resolve => void(require(['../views/reportStatistics/financeStat.vue'],resolve)),
                meta: { title: '财务统计报表', icon: 'fS' }
            },
            {
                path: 'refundStat',
                name: 'RefundStatistics',
                component: resolve => void(require(['../views/reportStatistics/refundStat.vue'],resolve)),
                meta: { title: '退款统计报表', icon: 'refS' }
            },
            {
                path: 'performanceStat',
                name: 'PerformanceStatistics',
                component: resolve => void(require(['../views/reportStatistics/performanceStat.vue'],resolve)),
                meta: { title: '业绩统计报表', icon: 'perS' }
            },
            {
                path: 'invoicingStat',
                name: 'InvoicingStatistics',
                component: resolve => void(require(['../views/reportStatistics/invoicingStat.vue'],resolve)),
                meta: { title: '进销存统计报表', icon: 'invS' }
            },
            {
                path: 'orderDtl',
                name: 'OrderDetails',
                component: resolve => void(require(['../views/reportStatistics/orderDtl.vue'],resolve)),
                meta: { title: '订单明细报表', icon: 'fiAc' }
            },
            {
                path: 'stockStat',
                name: 'StockStatistics',
                component: resolve => void(require(['../views/reportStatistics/stockStat.vue'],resolve)),
                meta: { title: '库存统计报表', icon: 'stock' }
            },
            {
                path: 'stockInStat',
                name: 'StockInStatistics',
                component: resolve => void(require(['../views/reportStatistics/stockInStat.vue'],resolve)),
                meta: { title: '入库统计报表', icon: 'puOr' }
            },
            {
                path: 'businessData',
                name: 'BusinessData',
                component: resolve => void(require(['../views/reportStatistics/businessData.vue'],resolve)),
                meta: { title: '业务数据报表', icon: 'pType' }
            },
            {
                path: 'packageStat',
                name: 'PackageStatistics',
                component: resolve => void(require(['../views/reportStatistics/packageStat.vue'],resolve)),
                meta: { title: '包件统计报表', icon: 'invS' }
            },
            {
                path: 'inventories',
                name: 'Inventories',
                component: resolve => void(require(['../views/reportStatistics/inventories.vue'],resolve)),
                meta: { title: '库存动向报表', icon: 'sync' }
            },
            {
                path: 'purchaseStat',
                name: 'purchaseStat',
                component: resolve => void(require(['../views/reportStatistics/purchaseStat.vue'],resolve)),
                meta: { title: '刷单统计报表', icon: 'prcS' }
            },
            {
                path: 'everydayStat',
                name: 'EveryDayStatistics',
                component: resolve => void(require(['../views/reportStatistics/everydayStat.vue'],resolve)),
                meta: { title: '每日报表统计', icon: 'everyS' }
            },
            {
                path: 'alipayStat',
                name: 'AlipayStatistics',
                component: resolve => void(require(['../views/reportStatistics/alipayStat.vue'],resolve)),
                meta: { title: '支付宝统计报表', icon: 'remoneylist' }
            },
            {
                path: 'evalQuality',
                name: 'EvalQuality',
                component: resolve => void(require(['../views/reportStatistics/evalQuality.vue'],resolve)),
                meta: { title: '评价定性报表', icon: 'afterS' }
            },
            {
                path: 'KPIStat',
                name: 'KPIStatistics',
                component: resolve => void(require(['../views/reportStatistics/KPIStat.vue'],resolve)),
                meta: { title: '绩效统计报表', icon: 'KS' }
            },
            {
                path: 'customerCommission',
                name: 'CustomerCommission',
                component: resolve => void(require(['../views/reportStatistics/customerCommission.vue'],resolve)),
                meta: { title: '客服提成报表', icon: 'cusMag' }
            },
            {
                path: 'sortDetail',
                name: 'SortDetail',
                component: resolve => void(require(['../views/reportStatistics/sortDetail.vue'],resolve)),
                meta: { title: '分拣明细报表', icon: 'poFo' }
            },
            {
                path: 'performCommission',
                name: 'PerformCommission',
                component: resolve => void(require(['../views/reportStatistics/performCommission.vue'],resolve)),
                meta: { title: '业绩提成报表', icon: 'stIn' }
            },
            {
                path: 'saleSummary',
                name: 'SaleSummary',
                component: resolve => void(require(['../views/reportStatistics/saleSummary.vue'],resolve)),
                meta: { title: '销售汇总报表', icon: 'ordCenter' }
            },{
                path: 'proAccount',
                name: 'ProAccount',
                component: resolve => void(require(['../views/reportStatistics/proAccount.vue'],resolve)),
                meta: { title: '产品核算报表', icon: 'pro' }
            },
            {
                path: 'halfProOut',
                name: 'HalfProOut',
                component: resolve => void(require(['../views/reportStatistics/halfProOut.vue'],resolve)),
                meta: { title: '半成品出库报表', icon: 'hPro' }
            },
            {
                path: 'newSortDtl',
                name: 'NewSortDtl',
                component: resolve => void(require(['../views/reportStatistics/newSortDtl.vue'],resolve)),
                meta: { title: '新分拣明细报表', icon: 'newS' }
            },
            {
                path: 'averageMonthSale',
                name: 'AverageMonthSale',
                component: resolve => void(require(['../views/reportStatistics/averageMonthSale.vue'],resolve)),
                meta: { title: '月均销量报表', icon: 'aveM' }
            },
            {
                path: 'inventoryWarn',
                name: 'InventoryWarn',
                component: resolve => void(require(['../views/reportStatistics/inventoryWarn.vue'],resolve)),
                meta: { title: '库存预警报表', icon: 'warn' }
            },
            {
                path: 'freightMag',
                name: 'FreightMag',
                component: resolve => void(require(['../views/reportStatistics/freightMag.vue'],resolve)),
                meta: { title: '运费管理报表', icon: 'typeP' }
            }
        ]
    },
    {
        name: 'ReSupplied',
        path: '/reSupplied',
        component: Layout,
        redirect: '/reSupplied/reSApplication',
        meta: { title: '补件管理', icon: 'resupp' },
        children: [
            {
                path: 'reSApplication',
                name: 'ReSApplication',
                component: resolve => void(require(['../views/reSupplied/reSApplication.vue'],resolve)),
                meta: { title: '补件申请', icon: 'fiAc' }
            },
            {
                path: 'reSReview',
                name: 'ReSReview',
                component: resolve => void(require(['../views/reSupplied/reSReview.vue'],resolve)),
                meta: { title: '补件审核', icon: 'cusRe' }
            },
            {
                path: 'reSShip',
                name: 'ReSShip',
                component: resolve => void(require(['../views/reSupplied/reSShip.vue'],resolve)),
                meta: { title: '补件发货', icon: 'ship' }
            },
            {
                path: 'reSCenter',
                name: 'ReSCenter',
                component: resolve => void(require(['../views/reSupplied/reSCenter.vue'],resolve)),
                meta: { title: '补件中心', icon: 'asLa' }
            },
        ]
    },
    {
        name: 'AfterSaleManagement',
        path: '/afterSaleMag',
        component: Layout,
        redirect: '/afterSaleMag/customerApplication',
        meta: { title: '售后管理', icon: 'afterS' },
        children: [
            {
                path: 'customerApplication',
                name: 'CustomerApplication',
                component: resolve => void(require(['../views/afterSaleMag/customerApplication.vue'],resolve)),
                meta: { title: '客服申请', icon: 'customer' }
            },
            {
                path: 'afterSSubmission',
                name: 'AfterSSubmission',
                component: resolve => void(require(['../views/afterSaleMag/afterSSubmission.vue'],resolve)),
                meta: { title: '售后提交', icon: 'submit' }
            },
            {
                path: 'afterSReview',
                name: 'AfterSReview',
                component: resolve => void(require(['../views/afterSaleMag/afterSReview.vue'],resolve)),
                meta: { title: '售后审核', icon: 'fiRea' }
            },
            {
                path: 'afterSCenter',
                name: 'AfterSCenter',
                component: resolve => void(require(['../views/afterSaleMag/afterSCenter.vue'],resolve)),
                meta: { title: '售后中心', icon: 'cusMag' }
            }
        ]
    },
    {
        name: 'AfterSaleCompensation',
        path: '/afterSaleCompensation',
        component: Layout,
        redirect: '/afterSaleCompensation/cmptnApplication',
        meta: { title: '售后赔偿', icon: 'afSComp' },
        children: [
            {
                path: 'cmptnApplication',
                name: 'CmptnApplication',
                component: resolve => void(require(['../views/afterSaleCompensation/cmptnApplication.vue'],resolve)),
                meta: { title: '赔偿申请', icon: 'fiAc' }
            },
            {
                path: 'cmptnReview',
                name: 'CmptnReview',
                component: resolve => void(require(['../views/afterSaleCompensation/cmptnReview.vue'],resolve)),
                meta: { title: '赔偿审核', icon: 'cusRe' }
            },
            {
                path: 'cmptnCenter',
                name: 'CmptnCenter',
                component: resolve => void(require(['../views/afterSaleCompensation/cmptnCenter.vue'],resolve)),
                meta: { title: '赔偿中心', icon: 'cusMag' }
            }
        ]
    },

       {
           path: '/hello',
           component: Layout,
           children: [
               {
                   path:'index',
                   name: 'Hello',
                   component: resolve => void(require(['../components/Hello.vue'], resolve)),
                   meta: { title: 'Hello', icon: 'hello'}
               }
    ]

       },
     /* /* {
          path: '/form',
          component: Layout,
          children: [
              {
                  path: 'index',
                  name: 'Form',
                  component: resolve => void(require(['../views/form/index.vue'],resolve)),
                  meta: { title: '表单', icon: 'form' }
              }
          ]
      },
      /* {
          name: 'Example',
          path: '/example',
          component: Layout,
          redirect: '/example/table',
          meta: { title: '例子', icon: 'example' },
          children: [
              {
                  path: 'table',
                  name: 'Table',
                  component: resolve => void(require(['../views/table/index.vue'],resolve)),
                  meta: { title: 'Table', icon: 'table' }
              },
              {
                  path: 'tree',
                  name: 'Tree',
                  component: resolve => void(require(['../views/tree/index.vue'],resolve)),
                  meta: { title: 'Tree', icon: 'tree' }
              }
          ]
      },*/
    {
        path: '*',
        redirect:'/404',
        hidden: true
    }
];

export default new VueRouter({
    // saveScrollPosition: true,
    scrollBehavior: () => ({ y: 0 }),
    routes: constantRouterMap
});

