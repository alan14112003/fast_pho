
export const DOMAIN = 'https://fast_pho.com/'
export const IMAGES = DOMAIN + 'images/'
export const ICONS = DOMAIN + 'icons/'
export const STORAGE = DOMAIN + 'storage/'

export const SLIDE_EDIT = DOMAIN + 'admin/slides/edit/:id'

export const _PRODUCTS = DOMAIN + 'products'

export const PRODUCT_EDIT = DOMAIN + 'admin/products/edit/'
export const SUB_PRODUCT_CREATE = DOMAIN + 'admin/products/:productId/subs/create'
export const SUB_PRODUCT_EDIT = DOMAIN + 'admin/products/:productId/subs/edit/:id'
export const PRODUCT_ORDER_VIEW = DOMAIN + 'admin/orders/product/:id'
export const PHOTO_ORDER_VIEW = DOMAIN + 'admin/orders/photo/:id'
export const PHOTO_ORDER_BILL = DOMAIN + 'admin/orders/photo/bill/:id'

export const PRODUCT_VIEW = DOMAIN + 'products/:slug'

export const CART_VIEW = DOMAIN + 'cart'

//Api:

//Auth
export const REGISTERING = DOMAIN + 'api/registering'
export const LOGINING = DOMAIN + 'api/logining'
export const LOGOUT = DOMAIN + 'api/logout'
export const UPDATE_PROFILE = DOMAIN + 'api/users/profile'
export const CHANGE_PASSWORD = DOMAIN + 'api/users/change-password'


//Slide
export const SLIDES = DOMAIN + 'api/slides'
export const SLIDE = DOMAIN + 'api/slides/:id'
export const SLIDE_STORE = DOMAIN + 'api/slides'
export const SLIDE_LAST_INDEX = DOMAIN + 'api/slides/last-index'
export const SLIDE_UPDATE = DOMAIN + 'api/slides/:id'
export const SLIDE_DELETE = DOMAIN + 'api/slides/:id'

//Product
export const PRODUCTS = DOMAIN + 'api/products'
export const PRODUCT = DOMAIN + 'api/products/:id'
export const PRODUCT_WITH_SUBS = DOMAIN + 'api/products/get_with_subs/:slug'
export const PRODUCT_STORE = DOMAIN + 'api/products'
export const PRODUCT_UPDATE = DOMAIN + 'api/products/:id'
export const PRODUCT_DELETE = DOMAIN + 'api/products/:id'

//Subs Product
export const SUBS_PRODUCTS = DOMAIN + 'api/products/:productId/subs'
export const SUB_PRODUCT = DOMAIN + 'api/products/:productId/subs/:id'
export const SUB_PRODUCT_STORE = DOMAIN + 'api/products/:productId/subs'
export const SUB_PRODUCT_UPDATE = DOMAIN + 'api/products/:productId/subs/:id'
export const SUB_PRODUCT_DELETE = DOMAIN + 'api/products/:productId/subs/:id'

//Category
export const CATEGORIES = DOMAIN + 'api/categories'
export const CATEGORY_CREATE = DOMAIN + 'api/categories'
export const CATEGORY_DELETE = DOMAIN + 'api/categories/:id'

//Order
export const PRODUCT_ORDERS = DOMAIN + 'api/orders/products'
export const PRODUCT_ORDER_CREATE = DOMAIN + 'api/orders/products'
export const PHOTOS_ORDERS = DOMAIN + 'api/orders/photos'
export const CHANGE_STATUS_ORDER = DOMAIN + 'api/orders/:id/change-status'
export const PRODUCT_ORDER = DOMAIN + 'api/orders/:id/product'
export const PHOTO_ORDER = DOMAIN + 'api/orders/:id/photo'

//Cart
export const CART = DOMAIN + 'api/cart'
export const CART_UPDATE = DOMAIN + 'api/cart/update'
export const CART_REMOVE = DOMAIN + 'api/cart/:id'

//Json
export const HN_TREE = DOMAIN + 'js/ha_noi_tree.json'
