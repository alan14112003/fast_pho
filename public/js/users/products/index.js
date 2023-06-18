import { DOMAIN, IMAGES, PRODUCTS, PRODUCT_VIEW, STORAGE } from "../../url.js";
import { getCategories } from "../../admin/categories.js";
import { calculateMoneyAfterSale, formatMoney, getParam, pushState, pushStates, renderPagination } from "../../helper.js";

const pcproList = $('.pcpro_list'), mproList = $('#mpro_list'), prolistList = $('.prolist_list');
const inputSearch = $('#search_input')
const icoItems = $('.ico-item')
let firstTabs, secTabs;
let curFirstTab, curSecTab, curIcoItem;

let perPage = 12,
    q,
    page,
    type,
    category,
    categorySlug,
    categoryIndex

const setOnClickTab = (tabs, curTab) => {
    tabs.off('click').on('click', function () {
        if (!this.isSameNode(curTab)) {
            $(curTab).toggleClass('active')
            curTab = this;

            category = $(this).attr('data-slug');
            if (category) {
                const arrCate = category.split('_');
                categorySlug = arrCate[0];
                categoryIndex = arrCate[1];
            }
            showProducts(1)
        } else {
            curTab = null
        }
        $(this).toggleClass('active')
    })
}

let categories;
try {
    categories = await getCategories();
} catch (error) {
    renderToast({
        status: 'danger',
        title: 'Danh mục sản phẩm',
        text: error
    })
}

const showCategories = async () => {
    categories.forEach(root => {
        let rootContent = `
        <li class="li">
            <a class="first_tab antart_b por pro_tit" data-slug="${root.slug}_${root.index}">${root.name}</a>
            <ul class="sec-nav">
                :nodeContent
            </ul>
        </li>
        `

        let nodeContent = "";
        root.children.forEach(node => {
            nodeContent += `
            <li class="sec-item">
                <a class="sec_tab antart_b por pro_tit" data-slug="${node.slug}_${node.index}">${node.name}</a>
                <ul class="third-nav">
                    :leafContent
                </ul>
            </li>
            `

            let leafContent = "";
            node.children.forEach(leaf => {
                leafContent += `
                <li class="third-item">
                    <a class="third_tab por pro_tit" data-slug="${leaf.slug}_${leaf.index}">${leaf.name}</a>
                </li>
                `
            })
            nodeContent = nodeContent.replace(':leafContent', leafContent);
        })

        rootContent = rootContent.replace(':nodeContent', nodeContent);
        pcproList.append(rootContent)
        mproList.append(rootContent)
    });
}

const showProducts = (tempPage) => {
    const data = {
        type: type,
        q: q,
        page: tempPage || page,
    }

    if (type === 'all') {
        data.type = null
    }

    pushStates({ c: category, ...data });

    $.ajax({
        url: PRODUCTS,
        type: 'GET',
        data: {
            perPage: perPage,
            categorySlug: categorySlug,
            categoryIndex: categoryIndex,
            ...data
        },
        success: function (response) {
            if (response.status) {
                const products = response.body.data

                prolistList.html("")
                products.forEach(p => {
                    prolistList.append(`
                    <li class="fl por antart_b">
                        <a href="${PRODUCT_VIEW.replace(':slug', p.slug)}">
                            <div class="hoverimg js-m imgwidth por animate">
                                <!--                     <img class="img" src="https://vn.deliworld.com/bocupload/product/100120196/100120196&(1).jpg" alt="Bút chì 2 đầu 12 màu  - 1/24/240">
                                             -->
                                <img class="img"
                                    src="${STORAGE + p.image}"
                                    alt="">
                                <div class="ico poa">
                                </div>
                            </div>

                            <div class="cont">${p.name}</div>
                            <div class="new-tip tov price"><span>${formatMoney(calculateMoneyAfterSale(p.price, p.sale))}</span><sup>đ</sup></div>
                            <div class="discount"><img src=${IMAGES + 'discount.png'} /><span>${p.sale}%</span></div>
                            <div class="new-tip">${p.category_name}</div>
                        </a>
                    </li>
                    `)
                })

                renderPagination(response.body, showProducts, page)
            }
        },
        error: function (response) {
            reject(response.responseJSON.message);
        }
    })
}

const setOnInputSearch = async () => {
    inputSearch.val(q.trim());
    inputSearch.off('input').on('input', function (e) {
        clearTimeout(this.delay)

        this.delay = setTimeout(() => {
            q = e.target.value.trim();
            showProducts()
        }, 300);
    })
}

const setOnClickFilterItem = () => {
    icoItems.off('click').on('click', function () {
        $(curIcoItem).toggleClass('cur')
        if (!this.isSameNode(curIcoItem)) {
            curIcoItem = this
            $(this).toggleClass('cur')

            type = $(this).attr('data-id')
        } else {
            type = curIcoItem = null
        }
        showProducts(1)
    })
}

const addValueToParams = async () => {
    q = getParam('q') ? getParam('q').trim() : '';
    page = getParam('page') || 1;
    type = getParam('type') || 'all';

    category = getParam('c');
    if (category) {
        const arrCate = category.split('_');
        categorySlug = arrCate[0];
        categoryIndex = arrCate[1]; s
    }
}

const main = async () => {
    await showCategories()
    await addValueToParams()

    showProducts()
    setOnInputSearch()
    setOnClickFilterItem()

    //Tabs Init
    firstTabs = $('.first_tab'), secTabs = $('.sec_tab');
    setOnClickTab(firstTabs, curFirstTab, curSecTab);
    setOnClickTab(secTabs, curSecTab, curFirstTab);

    //Filters Init
    $('.allproduct').off('click').on('click', () => {
        type = 'all'
        q = ''
        page = 1
        category = null;
        categorySlug = null;
        categoryIndex = null;

        showProducts(1)
    })

    $('.ico-item[data-id = ' + type + ']').addClass('cur')
    curIcoItem = document.querySelector('.ico-item[data-id = ' + type + ']')
}

await main()
