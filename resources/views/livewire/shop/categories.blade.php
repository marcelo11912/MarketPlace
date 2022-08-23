<div>
    <div class="header-left">
        <div class="dropdown category-dropdown has-border" data-visible="true">
            <a href="#" class="category-toggle text-dark" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                <i class="w-icon-category"></i>
                <span>Browse Categories</span>
            </a>

            <div class="dropdown-box">
                <ul class="menu vertical-menu category-menu">
                    @foreach ($categories as $category)
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-tshirt2"></i>{{$category->name}}
                        </a>
                         @if ($category->hasChildren())
                        <ul class="megamenu">
                            <li>
                                @foreach ($category->children() as $child)
                                <h4 class="menu-title">{{$child->name}}</h4>
                                
                                @if ($child->hasChildren())
                                <hr class="divider">
                                <ul>
                                    @foreach ($child->children() as $c)
                                    <li><a href="shop-fullwidth-banner.html">{{$c->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                               
                                @endforeach
                            </li>
                            {{--<li>
                                <h4 class="menu-title">Men</h4>
                                <hr class="divider">
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Jewlery &
                                            Watches</a></li>
                                </ul>
                            </li>--}}
                        </ul>
                        @endif
                    </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
        <nav class="main-nav">
            <ul class="menu active-underline">
                <li class="active">
                    <a href="demo1.html">Home</a>
                </li>
                <li>
                    <a href="shop-banner-sidebar.html">Shop</a>

                    <!-- Start of Megamenu -->
                    <ul class="megamenu">
                        <li>
                            <h4 class="menu-title">Shop Pages</h4>
                            <ul>
                                <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>
                                <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                <li><a href="shop-fullwidth-banner.html">Full Width Banner</a></li>
                                <li><a href="shop-horizontal-filter.html">Horizontal Filter<span class="tip tip-hot">Hot</span></a></li>
                                <li><a href="shop-off-canvas.html">Off Canvas Sidebar<span class="tip tip-new">New</span></a></li>
                                <li><a href="shop-infinite-scroll.html">Infinite Ajax Scroll</a>
                                </li>
                                <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                <li><a href="shop-both-sidebar.html">Both Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <h4 class="menu-title">Shop Layouts</h4>
                            <ul>
                                <li><a href="shop-grid-3cols.html">3 Columns Mode</a></li>
                                <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                                <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                                <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                                <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                                <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                                <li><a href="shop-list.html">List Mode</a></li>
                                <li><a href="shop-list-sidebar.html">List Mode With Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <h4 class="menu-title">Product Pages</h4>
                            <ul>
                                <li><a href="product-variable.html">Variable Product</a></li>
                                <li><a href="product-featured.html">Featured &amp; Sale</a></li>
                                <li><a href="product-accordion.html">Data In Accordion</a></li>
                                <li><a href="product-section.html">Data In Sections</a></li>
                                <li><a href="product-swatch.html">Image Swatch</a></li>
                                <li><a href="product-extended.html">Extended Info</a>
                                </li>
                                <li><a href="product-without-sidebar.html">Without Sidebar</a></li>
                                <li><a href="product-video.html">360<sup>o</sup> &amp; Video<span class="tip tip-new">New</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <h4 class="menu-title">Product Layouts</h4>
                            <ul>
                                <li><a href="product-default.html">Default<span class="tip tip-hot">Hot</span></a></li>
                                <li><a href="product-vertical.html">Vertical Thumbs</a></li>
                                <li><a href="product-grid.html">Grid Images</a></li>
                                <li><a href="product-masonry.html">Masonry</a></li>
                                <li><a href="product-gallery.html">Gallery</a></li>
                                <li><a href="product-sticky-info.html">Sticky Info</a></li>
                                <li><a href="product-sticky-thumb.html">Sticky Thumbs</a></li>
                                <li><a href="product-sticky-both.html">Sticky Both</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- End of Megamenu -->
                </li>
                <li>
                    <a href="vendor-dokan-store.html">Vendor</a>
                    <ul>
                        <li>
                            <a href="vendor-dokan-store-list.html">Store Listing</a>
                            <ul>
                                <li><a href="vendor-dokan-store-list.html">Store listing 1</a></li>
                                <li><a href="vendor-wcfm-store-list.html">Store listing 2</a></li>
                                <li><a href="vendor-wcmp-store-list.html">Store listing 3</a></li>
                                <li><a href="vendor-wc-store-list.html">Store listing 4</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="vendor-dokan-store.html">Vendor Store</a>
                            <ul>
                                <li><a href="vendor-dokan-store.html">Vendor Store 1</a></li>
                                <li><a href="vendor-wcfm-store-product-grid.html">Vendor Store 2</a>
                                </li>
                                <li><a href="vendor-wcmp-store-product-grid.html">Vendor Store 3</a>
                                </li>
                                <li><a href="vendor-wc-store-product-grid.html">Vendor Store 4</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="blog.html">Blog</a>
                    <ul>
                        <li><a href="blog.html">Classic</a></li>
                        <li><a href="blog-listing.html">Listing</a></li>
                        <li>
                            <a href="blog-grid-3cols.html">Grid</a>
                            <ul>
                                <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="blog-masonry-3cols.html">Masonry</a>
                            <ul>
                                <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="blog-mask-grid.html">Mask</a>
                            <ul>
                                <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="post-single.html">Single Post</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="about-us.html">Pages</a>
                    <ul>

                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="become-a-vendor.html">Become A Vendor</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                        <li><a href="faq.html">FAQs</a></li>
                        <li><a href="error-404.html">Error 404</a></li>
                        <li><a href="coming-soon.html">Coming Soon</a></li>
                        <li><a href="wishlist.html">Wishlist</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="my-account.html">My Account</a></li>
                        <li><a href="compare.html">Compare</a></li>
                    </ul>
                </li>
                <li>
                    <a href="elements.html">Elements</a>
                    <ul>
                        <li><a href="element-accordions.html">Accordions</a></li>
                        <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                        <li><a href="element-blog-posts.html">Blog Posts</a></li>
                        <li><a href="element-buttons.html">Buttons</a></li>
                        <li><a href="element-cta.html">Call to Action</a></li>
                        <li><a href="element-icons.html">Icons</a></li>
                        <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                        <li><a href="element-instagrams.html">Instagrams</a></li>
                        <li><a href="element-categories.html">Product Category</a></li>
                        <li><a href="element-products.html">Products</a></li>
                        <li><a href="element-tabs.html">Tabs</a></li>
                        <li><a href="element-testimonials.html">Testimonials</a></li>
                        <li><a href="element-titles.html">Titles</a></li>
                        <li><a href="element-typography.html">Typography</a></li>

                        <li><a href="element-vendors.html">Vendors</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
