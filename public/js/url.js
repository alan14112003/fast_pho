export const DOMAIN = 'http://fast_pho.com/'
export const ICONS = 'http://fast_pho.com/icons/'
export const IMAGES = 'http://fast_pho.com/images/'
export const STORAGE = 'http://fast_pho.com/storage/'

export const _PRODUCTS = DOMAIN + 'products'
export const PRODUCT_EDIT = DOMAIN + 'admin/products/edit/'
export const SUB_PRODUCT_EDIT = DOMAIN + 'admin/products/:productId/subs/:id'

export const PRODUCT_VIEW = DOMAIN + 'products/:slug'

//Api:

//Auth
export const REGISTERING = DOMAIN + 'api/registering'
export const LOGINING = DOMAIN + 'api/logining'
export const LOGOUT = DOMAIN + 'api/logout'

//Product
export const PRODUCTS = DOMAIN + 'api/products'
export const PRODUCT = DOMAIN + 'api/products/:id'
export const PRODUCT_WITH_SUBS = DOMAIN + 'api/products/get_with_subs/:slug'
export const PRODUCT_STORE = DOMAIN + 'api/products'
export const PRODUCT_UPDATE = DOMAIN + 'api/products/:id'
export const PRODUCT_DELETE = DOMAIN + 'api/products/:id'

//Subs Product
export const SUBS_PRODUCT = DOMAIN + 'api/products/:productId/subs'
export const SUB_PRODUCT_DELETE = DOMAIN + 'api/products/:productId/subs/:id'
export const SUB_PRODUCT_UPDATE = DOMAIN + 'api/products/:productId/subs/:id'

//Category
export const CATEGORIES = DOMAIN + 'api/categories'
export const CATEGORY_CREATE = DOMAIN + 'api/categories'
export const CATEGORY_DELETE = DOMAIN + 'api/categories/:id'
