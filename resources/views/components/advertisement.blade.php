@if($advertisement)
<div {{ $attributes->merge(['class' => 'advertisement advertisement-' . $position, 'data-position' => $position, 'data-ad-id' => $advertisement->id]) }}>
    {!! $advertisement->ad_code !!}
</div>
@endif
<style>
.advertisement {
    margin: 10px 0;
}

.advertisement-homepage_banner {
    text-align: center;
    margin: 15px 0;
}

.advertisement-sidebar_ad {
    margin: 15px 0;
}

.advertisement-footer_ad {
    text-align: center;
    margin: 20px 0;
}

.advertisement-content_top,
.advertisement-content_bottom {
    margin: 15px 0;
}

.advertisement-header_ad {
    text-align: center;
    margin: 10px 0;
}

.advertisement-link {
    display: block;
    text-decoration: none;
}

.advertisement-link:hover .advertisement-image {
    opacity: 0.9;
    transition: opacity 0.3s ease;
}

.text-advertisement {
    padding: 15px;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    background-color: #f9f9f9;
    text-align: center;
}

.advertisement-title {
    margin-bottom: 10px;
    color: #333;
}

.advertisement-description {
    margin-bottom: 15px;
    color: #666;
    font-size: 14px;
}

.advertisement-cta {
    font-size: 14px;
    padding: 8px 16px;
}

/* Position-specific styles */
.advertisement-homepage_banner {
    text-align: center;
    margin: 20px 0;
}

.advertisement-sidebar_ad {
    margin: 15px 0;
}

.advertisement-footer_ad {
    text-align: center;
    margin: 10px 0;
}

.advertisement-header_ad {
    text-align: center;
    margin: 10px 0;
}

.advertisement-content_top,
.advertisement-content_bottom {
    text-align: center;
    margin: 15px 0;
}

.advertisement-popup_ad {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
}
</style>