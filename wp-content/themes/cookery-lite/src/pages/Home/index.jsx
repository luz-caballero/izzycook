import { Icon, Sidebar, Card, Heading } from "../../components";
import { __ } from '@wordpress/i18n';

const Homepage = () => {
    const cardLists = [
        {
            iconSvg: <Icon icon="site" />,
            heading: __('Site Identity', 'cookery-lite'),
            buttonText: __('Customize', 'cookery-lite'),
            buttonUrl: cw_dashboard.custom_logo
        },
        {
            iconSvg: <Icon icon="colorsetting" />,
            heading: __("Color Settings", 'cookery-lite'),
            buttonText: __('Customize', 'cookery-lite'),
            buttonUrl: cw_dashboard.colors
        },
        {
            iconSvg: <Icon icon="layoutsetting" />,
            heading: __("Layout Settings", 'cookery-lite'),
            buttonText: __('Customize', 'cookery-lite'),
            buttonUrl: cw_dashboard.layout
        },
        {
            iconSvg: <Icon icon="instagramsetting" />,
            heading: __("Instagram Settings", 'cookery-lite'),
            buttonText: __('Customize', 'cookery-lite'),
            buttonUrl: cw_dashboard.instagram
        },
        {
            iconSvg: <Icon icon="generalsetting" />,
            heading: __("General Settings"),
            buttonText: __('Customize', 'cookery-lite'),
            buttonUrl: cw_dashboard.general
        },
        {
            iconSvg: <Icon icon="footersetting" />,
            heading: __('Footer Settings', 'cookery-lite'),
            buttonText: __('Customize', 'cookery-lite'),
            buttonUrl: cw_dashboard.footer
        }
    ];

    const proSettings = [
        {
            heading: __('Header Layouts', 'cookery-lite'),
            para: __('Choose from different unique header layouts.', 'cookery-lite'),
            buttonText: __('Learn More', 'cookery-lite'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            heading: __('Multiple Layouts', 'cookery-lite'),
            para: __('Choose layouts for blogs, banners, posts and more.', 'cookery-lite'),
            buttonText: __('Learn More', 'cookery-lite'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            heading: __('Multiple Sidebar', 'cookery-lite'),
            para: __('Set different sidebars for posts and pages.', 'cookery-lite'),
            buttonText: __('Learn More', 'cookery-lite'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            heading: __('Top Bar Settings', 'cookery-lite'),
            para: __('Show a notice or newsletter at the top.', 'cookery-lite'),
            buttonText: __('Learn More', 'cookery-lite'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            para: __('Boost your website performance with ease.', 'cookery-lite'),
            heading: __('Performance Settings', 'cookery-lite'),
            buttonText: __('Learn More', 'cookery-lite'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            para: __('Choose typography for different heading tags.', 'cookery-lite'),
            heading: __('Typography Settings', 'cookery-lite'),
            buttonText: __('Learn More', 'cookery-lite'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            para: __('Import the demo content to kickstart your site.', 'cookery-lite'),
            heading: __('One Click Demo Import', 'cookery-lite'),
            buttonText: __('Learn More', 'cookery-lite'),
            buttonUrl: cw_dashboard?.get_pro
        },
        {
            para: __('Easily place ads on high conversion areas.', 'cookery-lite'),
            heading: __('Advertisement Settings', 'cookery-lite'),
            buttonText: __('Learn More', 'cookery-lite'),
            buttonUrl: cw_dashboard?.get_pro
        },
    ];

    const sidebarSettings = [
        {
            heading: __('We Value Your Feedback!', 'cookery-lite'),
            icon: "star",
            para: __("Your review helps us improve and assists others in making informed choices. Share your thoughts today!", 'cookery-lite'),
            imageurl: <Icon icon="review" />,
            buttonText: __('Leave a Review', 'cookery-lite'),
            buttonUrl: cw_dashboard.review
        },
        {
            heading: __('Knowledge Base', 'cookery-lite'),
            para: __("Need help using our theme? Visit our well-organized Knowledge Base!", 'cookery-lite'),
            imageurl: <Icon icon="documentation" />,
            buttonText: __('Explore', 'cookery-lite'),
            buttonUrl: cw_dashboard.docmentation
        },
        {
            heading: __('Need Assistance? ', 'cookery-lite'),
            para: __("If you need help or have any questions, don't hesitate to contact our support team. We're here to assist you!", 'cookery-lite'),
            imageurl: <Icon icon="supportTwo" />,
            buttonText: __('Submit a Ticket', 'cookery-lite'),
            buttonUrl: cw_dashboard.support
        }
    ];

    return (
        <>
            <div className="customizer-settings">
                <div className="cw-customizer">
                    <div className="video-section">
                        <div className="cw-settings">
                            <h2>{__('Cookery Lite Tutorial', 'cookery-lite')}</h2>
                        </div>
                        <iframe src="https://www.youtube.com/embed/Xv_hJTux5kQ?si=6uaX20a6rlXXmLiL" title={__( 'How to Start Your First Food Blog In 2023 | Cookery Lite Free WordPress Theme', 'cookery-lite' )} frameBorder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerPolicy="strict-origin-when-cross-origin" allowFullScreen></iframe>
                    </div>
                    <Heading
                        heading={__( 'Quick Customizer Settings', 'cookery-lite' )}
                        buttonText={__( 'Go To Customizer', 'cookery-lite' )}
                        buttonUrl={cw_dashboard?.customizer_url}
                        openInNewTab={true}
                    />
                    <Card
                        cardList={cardLists}
                        cardPlace='customizer'
                        cardCol='three-col'
                    />
                    <Heading
                        heading={__( 'More features with Pro version', 'cookery-lite' )}
                        buttonText={__( 'Go To Customizer', 'cookery-lite' )}
                        buttonUrl={cw_dashboard?.customizer_url}
                        openInNewTab={true}
                    />
                    <Card
                        cardList={proSettings}
                        cardPlace='cw-pro'
                        cardCol='two-col'
                    />
                    <div className="cw-button">
                        <a href={cw_dashboard?.get_pro} target="_blank" className="cw-button-btn primary-btn long-button">{__('Learn more about the Pro version', 'cookery-lite')}</a>
                    </div>
                </div>
                <Sidebar sidebarSettings={sidebarSettings} openInNewTab={true} />
            </div>
        </>
    );
}

export default Homepage;