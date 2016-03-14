<div class="wrap" id="wedocs-app">

    <h1><?php _e( 'Documentations', 'wedocs' ); ?> <a class="page-title-action" href="#" v-on:click.prevent="addDoc"><?php _e( 'Add Doc', 'wedocs' ); ?></a></h1>

    <!-- <pre>@{{ $data | json }}</pre> -->

    <span class="spinner is-active" style="float: none;"></span>

    <ul class="docs not-loaded" v-sortable>
        <li class="single-doc" v-for="doc in docs" data-id="{{ doc.post.id }}">
            <h3>
                <a target="_blank" href="{{ editurl }}{{ doc.post.id }}">{{ doc.post.title }}<span v-if="doc.post.status != 'publish'" class="doc-status">{{ doc.post.status }}</span></a>

                <span class="wedocs-row-actions">
                    <a target="_blank" href="{{ editurl }}{{ doc.post.id }}" title="<?php esc_attr_e( 'Edit the doc', 'wedocs' ); ?>"><span class="dashicons dashicons-edit"></span></a>
                    <a target="_blank" href="{{ viewurl }}{{doc.post.id }}" title="<?php esc_attr_e( 'Preview the doc', 'wedocs' ); ?>"><span class="dashicons dashicons-external"></span></a>
                    <span class="wedocs-btn-remove" v-on:click="removeDoc(doc, docs)" title="<?php esc_attr_e( 'Delete this doc', 'wedocs' ); ?>"><span class="dashicons dashicons-trash"></span></span>
                    <span class="wedocs-btn-reorder"><span class="dashicons dashicons-menu"></span></span>
                </span>
            </h3>

            <div class="inside">
                <ul class="sections" v-sortable>
                    <li v-for="section in doc.child" data-id="{{ section.post.id }}">
                        <span class="section-title" v-on:click="toggleCollapse">
                            <a target="_blank" href="{{ editurl }}{{section.post.id }}">{{ section.post.title }}<span v-if="section.post.status != 'publish'" class="doc-status">{{ section.post.status }}</span> <span v-if="section.child.length > 0" class="count">{{ section.child.length }}</span></a>

                            <span class="actions wedocs-row-actions">
                                <span class="wedocs-btn-reorder" title="<?php esc_attr_e( 'Re-order this section', 'wedocs' ); ?>"><span class="dashicons dashicons-menu"></span></span>
                                <a target="_blank" href="{{ editurl }}{{section.post.id }}" title="<?php esc_attr_e( 'Edit the section', 'wedocs' ); ?>"><span class="dashicons dashicons-edit"></span></a>
                                <a target="_blank" href="{{ viewurl }}{{section.post.id }}" title="<?php esc_attr_e( 'Preview the section', 'wedocs' ); ?>"><span class="dashicons dashicons-external"></span></a>
                                <span class="wedocs-btn-remove" v-on:click="removeSection(section, doc.child)" title="<?php esc_attr_e( 'Delete this section', 'wedocs' ); ?>"><span class="dashicons dashicons-trash"></span></span>
                                <span class="add-article" v-on:click="addArticle(section)" title="<?php esc_attr_e( 'Add a new article', 'wedocs' ); ?>"><span class="dashicons dashicons-plus-alt"></span></span>
                            </span>
                        </span>

                        <ul class="articles collapsed" v-if="section.child" v-sortable>
                            <li class="article" v-for="article in section.child" data-id="{{ article.post.id }}">
                                <a target="_blank" href="{{ editurl }}{{ article.post.id }}">{{ article.post.title }}<span v-if="article.post.status != 'publish'" class="doc-status">{{ article.post.status }}</span></a>

                                <span class="actions wedocs-row-actions">
                                    <span class="wedocs-btn-reorder"><span class="dashicons dashicons-menu"></span></span>
                                    <a target="_blank" href="{{ viewurl }}{{article.post.id }}" title="<?php esc_attr_e( 'Preview the article', 'wedocs' ); ?>"><span class="dashicons dashicons-external"></span></a>
                                    <a target="_blank" href="{{ editurl }}{{article.post.id }}" title="<?php esc_attr_e( 'Edit the section', 'wedocs' ); ?>"><span class="dashicons dashicons-edit"></span></a>
                                    <span class="wedocs-btn-remove" v-on:click="removeArticle(article, section.child)" title="<?php esc_attr_e( 'Delete this article', 'wedocs' ); ?>"><span class="dashicons dashicons-trash"></span></span>
                                </span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="add-section">
                <a class="button button-primary" href="#" v-on:click.prevent="addSection(doc)"><?php _e( 'Add Section', 'wedocs' ); ?></a>
            </div>
        </li>
    </ul>

    <div class="no-docs not-loaded" v-show="!docs.length">
        <?php printf( __( 'No docs has been found. Perhaps %s?', 'wedocs' ), '<a href="#" v-on:click.prevent="addDoc">' . __( 'create one', 'wedocs' ) . '</a>' ); ?>
    </div>

</div>
