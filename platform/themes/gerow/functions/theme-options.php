<?php

use Botble\Theme\Events\RenderingThemeOptionSettings;

app('events')->listen(RenderingThemeOptionSettings::class, function (): void {
    $themeOption = theme_option();

    $themeOption
        ->setSection([
            'title'      => __('General'),
            'desc'       => __('General settings for the Azhar theme.'),
            'id'         => 'general',
            'subsection' => true,
            'icon'       => 'fa fa-home',
        ])
        ->setField([
            'id'         => 'site_name',
            'section_id' => 'general',
            'type'       => 'text',
            'label'      => __('Site name'),
            'attributes' => [
                'name'    => 'site_name',
                'value'   => theme_option('site_name', 'Azhar'),
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => __('Enter the website name'),
                ],
            ],
        ])
        ->setField([
            'id'         => 'site_description',
            'section_id' => 'general',
            'type'       => 'text',
            'label'      => __('Site description'),
            'attributes' => [
                'name'    => 'site_description',
                'value'   => theme_option('site_description', __('A professional Botble theme.')),
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => __('Enter a short description for the website'),
                ],
            ],
        ])
        ->setField([
            'id'         => 'logo',
            'section_id' => 'general',
            'type'       => 'mediaImage',
            'label'      => __('Logo'),
            'attributes' => [
                'name'  => 'logo',
                'value' => theme_option('logo'),
            ],
        ])
        ->setField([
            'id'         => 'favicon',
            'section_id' => 'general',
            'type'       => 'mediaImage',
            'label'      => __('Favicon'),
            'attributes' => [
                'name'  => 'favicon',
                'value' => theme_option('favicon'),
            ],
        ])
        ->setField([
            'id'         => 'contact_email',
            'section_id' => 'general',
            'type'       => 'text',
            'label'      => __('Contact email'),
            'attributes' => [
                'name'    => 'contact_email',
                'value'   => theme_option('contact_email'),
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => __('info@example.com'),
                ],
            ],
        ])
        ->setField([
            'id'         => 'contact_phone',
            'section_id' => 'general',
            'type'       => 'text',
            'label'      => __('Contact phone'),
            'attributes' => [
                'name'    => 'contact_phone',
                'value'   => theme_option('contact_phone'),
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => __('+966 555 555 555'),
                ],
            ],
        ])
        ->setField([
            'id'         => 'facebook_url',
            'section_id' => 'general',
            'type'       => 'text',
            'label'      => __('Facebook URL'),
            'attributes' => [
                'name'    => 'facebook_url',
                'value'   => theme_option('facebook_url'),
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => __('https://facebook.com/yourpage'),
                ],
            ],
        ])
        ->setField([
            'id'         => 'twitter_url',
            'section_id' => 'general',
            'type'       => 'text',
            'label'      => __('Twitter URL'),
            'attributes' => [
                'name'    => 'twitter_url',
                'value'   => theme_option('twitter_url'),
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => __('https://twitter.com/yourprofile'),
                ],
            ],
        ])
        ->setField([
            'id'         => 'linkedin_url',
            'section_id' => 'general',
            'type'       => 'text',
            'label'      => __('LinkedIn URL'),
            'attributes' => [
                'name'    => 'linkedin_url',
                'value'   => theme_option('linkedin_url'),
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => __('https://linkedin.com/company/yourcompany'),
                ],
            ],
        ])
        ->setField([
            'id'         => 'instagram_url',
            'section_id' => 'general',
            'type'       => 'text',
            'label'      => __('Instagram URL'),
            'attributes' => [
                'name'    => 'instagram_url',
                'value'   => theme_option('instagram_url'),
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => __('https://instagram.com/yourprofile'),
                ],
            ],
        ])
        ->setSection([
            'title' => __('Social Links'),
            'desc' => __('Social Links at the footer.'),
            'id' => 'opt-text-subsection-social-links',
            'subsection' => true,
            'icon' => 'ti ti-share',
            'fields' => [
                [
                    'id' => 'social_links',
                    'type' => 'repeater',
                    'label' => __('Social Links'),
                    'attributes' => [
                        'name' => 'social_links',
                        'value' => theme_option('social_links'),
                        'fields' => [
                            [
                                'type' => 'text',
                                'label' => __('Name'),
                                'attributes' => [
                                    'name' => 'name',
                                    'value' => null,
                                    'options' => [
                                        'class' => 'form-control',
                                    ],
                                ],
                            ],
                            [
                                'type' => 'themeIcon',
                                'label' => __('Icon'),
                                'attributes' => [
                                    'name' => 'social-icon',
                                    'value' => null,
                                    'options' => [
                                        'class' => 'form-control',
                                    ],
                                ],
                            ],
                            [
                                'type' => 'text',
                                'label' => __('URL'),
                                'attributes' => [
                                    'name' => 'url',
                                    'value' => null,
                                    'options' => [
                                        'class' => 'form-control',
                                    ],
                                ],
                            ],
                            [
                                'type' => 'mediaImage',
                                'label' => __('Icon Image (It will replace Icon Font if it is present.)'),
                                'attributes' => [
                                    'name' => 'social-icon-image',
                                    'value' => null,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ])
        ->setField([
            'id' => 'breadcrumb_background',
            'section_id' => 'opt-text-subsection-breadcrumb',
            'type' => 'mediaImage',
            'label' => __('Breadcrumb background'),
            'attributes' => [
                'name' => 'breadcrumb_background',
            ],
        ])
        ->setField([
            'id' => 'breadcrumb_background_overlay_enabled',
            'section_id' => 'opt-text-subsection-breadcrumb',
            'type' => 'customSelect',
            'label' => __('Enable breadcrumb background overlay?'),
            'attributes' => [
                'name' => 'breadcrumb_background_overlay_enabled',
                'list' => [
                    'yes' => trans('core/base::base.yes'),
                    'no' => trans('core/base::base.no'),
                ],
                'value' => theme_option('breadcrumb_background_overlay_enabled', 'yes'),
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'breadcrumb_first_shape_image',
            'section_id' => 'opt-text-subsection-breadcrumb',
            'type' => 'mediaImage',
            'label' => __('Breadcrumb first shape image'),
            'attributes' => [
                'name' => 'breadcrumb_first_shape_image',
            ],
        ])
        ->setField([
            'id' => 'breadcrumb_second_shape_image',
            'section_id' => 'opt-text-subsection-breadcrumb',
            'type' => 'mediaImage',
            'label' => __('Breadcrumb second shape image'),
            'attributes' => [
                'name' => 'breadcrumb_second_shape_image',
            ],
        ])
        ->setSection([
            'title' => __('Styles'),
            'id' => 'opt-text-subsection-styles',
            'subsection' => true,
            'icon' => 'ti ti-palette',
            'fields' => [
                [
                    'id' => 'header_style',
                    'type' => 'customSelect',
                    'label' => __('Header style'),
                    'attributes' => [
                        'name' => 'header_style',
                        'choices' => [
                            'style-1' => __('Header style :number', ['number' => 1]),
                            'style-2' => __('Header style :number', ['number' => 2]),
                            'style-3' => __('Header style :number', ['number' => 3]),
                            'azhar-dark' => __('Azhar Footer (Dark)'),
                            'azhar-light' => __('Azhar Footer (Light)'),
                        ],
                        'value' => theme_option('header_style', 'style-1'),
                    ],
                ],
                [
                    'id' => 'header_top_sidebar_style',
                    'type' => 'customSelect',
                    'label' => __('Header top sidebar style'),
                    'attributes' => [
                        'name' => 'header_top_sidebar_style',
                        'choices' => [
                            'style-1' => __('Header style :number', ['number' => 1]),
                            'style-2' => __('Header style :number', ['number' => 2]),
                        ],
                        'value' => theme_option('header_top_sidebar_style', 'style-1'),
                    ],
                ],
                [
                    'id' => 'bottom_footer_style',
                    'type' => 'customSelect',
                    'label' => __('Footer bottom style'),
                    'attributes' => [
                        'name' => 'bottom_footer_style',
                        'choices' => [
                            'style-1' => __('Header style :number', ['number' => 1]),
                            'custom' => __('Custom HTML (Widgets)'),
                        ],
                        'value' => theme_option('bottom_footer_style', 'style-1'),
                    ],
                ],
                [
                    'id' => 'pre_footer_sidebar_style',
                    'type' => 'customSelect',
                    'label' => __('Pre footer sidebar style'),
                    'attributes' => [
                        'name' => 'pre_footer_sidebar_style',
                        'choices' => [
                            'default' => __('Default'),
                            'style-1' => __('Header style :number', ['number' => 1]),
                        ],
                        'value' => theme_option('pre_footer_sidebar_style', 'default'),
                    ],
                ],
                [
                    'id' => 'customize_footer',
                    'type' => 'customSelect',
                    'label' => __('Customize footer style?'),
                    'attributes' => [
                        'name' => 'customize_footer',
                        'list' => [
                            'yes' => trans('core/base::base.yes'),
                            'no' => trans('core/base::base.no'),
                        ],
                        'value' => theme_option('customize_footer', 'no'),
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ],
                [
                    'id' => 'footer_style',
                    'type' => 'customSelect',
                    'label' => __('Footer style'),
                    'attributes' => [
                        'name' => 'footer_style',
                        'choices' => [
                            'style-1' => __('Footer style :number', ['number' => 1]),
                            'style-2' => __('Footer style :number', ['number' => 2]),
                            'azhar-dark' => __('Azhar Footer (Dark)'),
                            'azhar-light' => __('Azhar Footer (Light)'),
                        ],
                        'value' => theme_option('footer_style', 'style-1'),
                    ],
                ],
                [
                    'id' => 'heading_font',
                    'type' => 'googleFonts',
                    'label' => __('Heading font'),
                    'attributes' => [
                        'name' => 'heading_font',
                        'value' => theme_option('heading_font', 'Urbanist'),
                    ],
                ],
                [
                    'id' => 'primary_font',
                    'type' => 'googleFonts',
                    'label' => __('Primary font'),
                    'attributes' => [
                        'name' => 'primary_font',
                        'value' => theme_option('primary_font', 'Plus Jakarta Sans'),
                    ],
                ],
                [
                    'id' => 'primary_color',
                    'type' => 'customColor',
                    'label' => __('Primary color'),
                    'attributes' => [
                        'name' => 'primary_color',
                        'value' => theme_option('primary_color', '#0055FF'),
                    ],
                ],
                [
                    'id' => 'primary_hover_color',
                    'type' => 'customColor',
                    'label' => __('Primary hover color'),
                    'attributes' => [
                        'name' => 'primary_hover_color',
                        'value' => theme_option('primary_hover_color', '#0049DC'),
                    ],
                ],
                [
                    'id' => 'secondary_color',
                    'type' => 'customColor',
                    'label' => __('Secondary color'),
                    'attributes' => [
                        'name' => 'secondary_color',
                        'value' => theme_option('secondary_color', '#00194C'),
                    ],
                ],
                [
                    'id' => 'heading_color',
                    'type' => 'customColor',
                    'label' => __('Heading color'),
                    'attributes' => [
                        'name' => 'heading_color',
                        'value' => theme_option('heading_color', '#00194C'),
                    ],
                ],
                [
                    'id' => 'text_color',
                    'type' => 'customColor',
                    'label' => __('Text color'),
                    'attributes' => [
                        'name' => 'text_color',
                        'value' => theme_option('text_color', '#334770'),
                    ],
                ],
                [
                    'id' => 'footer_background_color',
                    'type' => 'customColor',
                    'label' => __('Footer background color'),
                    'attributes' => [
                        'name' => 'footer_background_color',
                        'value' => theme_option('footer_background_color', '#F8FAFF'),
                    ],
                ],
                [
                    'id' => 'footer_text_color',
                    'type' => 'customColor',
                    'label' => __('Footer text color'),
                    'attributes' => [
                        'name' => 'footer_text_color',
                        'value' => theme_option('footer_text_color', '#000000'),
                    ],
                ],
                [
                    'id' => 'footer_text_muted_color',
                    'type' => 'customColor',
                    'label' => __('Footer text muted color'),
                    'attributes' => [
                        'name' => 'footer_text_muted_color',
                        'value' => theme_option('footer_text_muted_color', '#777777'),
                    ],
                ],
                [
                    'id' => 'footer_border_color',
                    'type' => 'customColor',
                    'label' => __('Footer border color'),
                    'attributes' => [
                        'name' => 'footer_border_color',
                        'value' => theme_option('footer_border_color', '#0055FF'),
                    ],
                ],
                [
                    'id' => 'footer_background_image',
                    'type' => 'mediaImage',
                    'label' => __('Footer background image'),
                    'attributes' => [
                        'name' => 'footer_background_image',
                        'value' => theme_option('footer_background_image'),
                    ],
                ],
            ],
        ])
        ->setSection([
            'title' => __('Azhar Header'),
            'id' => 'azhar-header-options',
            'subsection' => true,
            'icon' => 'ti ti-layout-navbar',
            'fields' => [
                [
                    'id' => 'azhar_logo_dark',
                    'type' => 'mediaImage',
                    'label' => __('Header logo (dark background)'),
                    'attributes' => [
                        'name' => 'azhar_logo_dark',
                        'value' => theme_option('azhar_logo_dark'),
                    ],
                ],
                [
                    'id' => 'azhar_logo_light',
                    'type' => 'mediaImage',
                    'label' => __('Header logo (light background)'),
                    'attributes' => [
                        'name' => 'azhar_logo_light',
                        'value' => theme_option('azhar_logo_light'),
                    ],
                ],
                [
                    'id' => 'azhar_header_secondary_links',
                    'type' => 'repeater',
                    'label' => __('Header secondary links'),
                    'attributes' => [
                        'name' => 'azhar_header_secondary_links',
                        'value' => theme_option('azhar_header_secondary_links', []),
                        'fields' => [
                            [
                                'type' => 'text',
                                'label' => __('Label'),
                                'attributes' => [
                                    'name' => 'label',
                                    'value' => null,
                                    'options' => [
                                        'class' => 'form-control',
                                    ],
                                ],
                            ],
                            [
                                'type' => 'text',
                                'label' => __('URL'),
                                'attributes' => [
                                    'name' => 'url',
                                    'value' => null,
                                    'options' => [
                                        'class' => 'form-control',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 'azhar_header_primary_button_label',
                    'type' => 'text',
                    'label' => __('Primary button label'),
                    'attributes' => [
                        'name' => 'azhar_header_primary_button_label',
                        'value' => theme_option('azhar_header_primary_button_label'),
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ],
                [
                    'id' => 'azhar_header_primary_button_url',
                    'type' => 'text',
                    'label' => __('Primary button URL'),
                    'attributes' => [
                        'name' => 'azhar_header_primary_button_url',
                        'value' => theme_option('azhar_header_primary_button_url'),
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ],
                [
                    'id' => 'azhar_header_show_language',
                    'type' => 'customSelect',
                    'label' => __('Show language switcher'),
                    'attributes' => [
                        'name' => 'azhar_header_show_language',
                        'list' => [
                            1 => trans('core/base::base.yes'),
                            0 => trans('core/base::base.no'),
                        ],
                        'value' => theme_option('azhar_header_show_language', 1),
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ],
            ],
        ])
        ->setSection([
            'title' => __('Azhar Footer'),
            'id' => 'azhar-footer-options',
            'subsection' => true,
            'icon' => 'ti ti-layout-navbar-collapse',
            'fields' => [
                [
                    'id' => 'azhar_footer_logo',
                    'type' => 'mediaImage',
                    'label' => __('Footer logo'),
                    'attributes' => [
                        'name' => 'azhar_footer_logo',
                        'value' => theme_option('azhar_footer_logo'),
                    ],
                ],
                [
                    'id' => 'azhar_footer_links_left',
                    'type' => 'repeater',
                    'label' => __('Footer links - first column'),
                    'attributes' => [
                        'name' => 'azhar_footer_links_left',
                        'value' => theme_option('azhar_footer_links_left'),
                        'fields' => [
                            [
                                'type' => 'text',
                                'label' => __('Label'),
                                'attributes' => [
                                    'name' => 'label',
                                    'value' => null,
                                    'options' => [
                                        'class' => 'form-control',
                                    ],
                                ],
                            ],
                            [
                                'type' => 'text',
                                'label' => __('URL'),
                                'attributes' => [
                                    'name' => 'url',
                                    'value' => null,
                                    'options' => [
                                        'class' => 'form-control',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 'azhar_footer_links_right',
                    'type' => 'repeater',
                    'label' => __('Footer links - second column'),
                    'attributes' => [
                        'name' => 'azhar_footer_links_right',
                        'value' => theme_option('azhar_footer_links_right'),
                        'fields' => [
                            [
                                'type' => 'text',
                                'label' => __('Label'),
                                'attributes' => [
                                    'name' => 'label',
                                    'value' => null,
                                    'options' => [
                                        'class' => 'form-control',
                                    ],
                                ],
                            ],
                            [
                                'type' => 'text',
                                'label' => __('URL'),
                                'attributes' => [
                                    'name' => 'url',
                                    'value' => null,
                                    'options' => [
                                        'class' => 'form-control',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 'azhar_footer_privacy_label',
                    'type' => 'text',
                    'label' => __('Privacy link label'),
                    'attributes' => [
                        'name' => 'azhar_footer_privacy_label',
                        'value' => theme_option('azhar_footer_privacy_label'),
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ],
                [
                    'id' => 'azhar_footer_privacy_url',
                    'type' => 'text',
                    'label' => __('Privacy link URL'),
                    'attributes' => [
                        'name' => 'azhar_footer_privacy_url',
                        'value' => theme_option('azhar_footer_privacy_url'),
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ],
                [
                    'id' => 'azhar_footer_copyright',
                    'type' => 'textarea',
                    'label' => __('Footer copyright text'),
                    'attributes' => [
                        'name' => 'azhar_footer_copyright',
                        'value' => theme_option('azhar_footer_copyright'),
                        'options' => [
                            'class' => 'form-control',
                            'rows' => 3,
                        ],
                    ],
                ],
            ],
        ])
        ->setField([
            'id' => 'animation_enabled',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customSelect',
            'label' => __('Enable animation?'),
            'attributes' => [
                'name' => 'animation_enabled',
                'list' => [
                    true => trans('core/base::base.yes'),
                    false => trans('core/base::base.no'),
                ],
                'value' => theme_option('animation_enabled', true),
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'phone',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'text',
            'label' => __('Phone number'),
            'attributes' => [
                'name' => 'phone',
                'value' => theme_option('phone'),
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => __('Enter phone number'),
                ],
            ],
        ])
        ->setField([
            'id' => 'address',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'textarea',
            'label' => __('Address'),
            'attributes' => [
                'name' => 'address',
                'value' => theme_option('address'),
                'options' => [
                    'rows' => 3,
                    'class' => 'form-control',
                    'placeholder' => __('Enter location address'),
                ],
            ],
        ]);
});









