# 파일 구성
폴더 구조
- resources : `.less` 등의 스타일 시트와 `.js`
- templates : `.mustache` 파일들.



# 템플릿

컨텐츠 영역
- ContentIndicators : 페이지 상단의 인디케이터 영역. '도움말' 아이콘 등이 나타남.
- ContentHeading : 페이지 제목이 나타나는 영역.
- ContentActions2 : 페이지에서 관리 메뉴. 역사,편집(data-views) + 관리자 기능(data-actions)
- ContentNamespaces : 토론 페이지에 대한 액세스. 이 스킨에서는 이용되지 않음.
- ContentBody
- TableOfContents
    - TableOfContents__line


디자인 요소
- PersonalMenu : 사용자 메뉴. 보통 우측 상단에 위치한 사람모양 아이콘과 드롭다운 메뉴.
- Logo : 로고 영역
- Notifications : 알림 영역.
- Search : 검색 폼.


- Notices : 공지 영역.
- Footer : 하단 영역.
  - FooterList : 하단 영역의 목록으로 출력되는 부분.


기타
- CategoryPortlet : `{{{ html-categories }}}`를 사용할 때에는 사용되지 않음. 즉, 이 스킨에서는 이용하지 않음. (`content\ContentBody.mustache` 참조)


ContentTagline
