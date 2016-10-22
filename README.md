```
yunliwang
    article_cat 文章分类
        id int 主键
        name varchar 分类名称
        seo_name varchar SEO名称
        description varchar 描述
        is_page int 是单页
        is_link int 是链接
        created_at int 创建时间
        updated_at int 更新时间
        content text 单页内容

    article 文章
        id int 主键
        article_cat_id int 分类id
        title varchar 文章标题
        seo_title varchar SEO标题
        description varcahr 描述
        created_at int 创建时间
        updated_at int 更新时间

    article_content 文章内容
        id int 主键
        article_id int 文章id
        content text 文章内容
```