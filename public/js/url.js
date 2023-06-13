export const DOMAIN = 'https://fast_pho.com/'
export const ICONS = DOMAIN + 'icons/'
export const STORAGE = DOMAIN + 'storage/'

export const PRODUCT_EDIT = DOMAIN + 'admin/products/edit/'
export const SUB_PRODUCT_CREATE = DOMAIN + 'admin/products/:productId/subs/create'
export const SUB_PRODUCT_EDIT = DOMAIN + 'admin/products/:productId/subs/edit/:id'

//Api:

//Auth
export const REGISTERING = DOMAIN + 'api/registering'
export const LOGINING = DOMAIN + 'api/logining'
export const LOGOUT = DOMAIN + 'api/logout'

//Product
export const PRODUCTS = DOMAIN + 'api/products'
export const PRODUCT = DOMAIN + 'api/products/:id'
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
