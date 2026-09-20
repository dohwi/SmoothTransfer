<div align="center">
  <h1>SmoothTransfer</h1>
  <p>Minecraft: Bedrock Edition (PocketMine-MP) 서버 이동 및 로그인 페이드 트랜지션 플러그인</p>

  <p>
    <a href="https://pmmp.io" target="_blank" rel="noreferrer"><img src="https://img.shields.io/badge/PocketMine--MP-API%205.0.0-FF8C00?style=flat-square" /></a>
    <a href="https://www.php.net" target="_blank" rel="noreferrer"><img src="https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat-square&logo=php&logoColor=white" /></a>
    <a href="https://www.minecraft.net" target="_blank" rel="noreferrer"><img src="https://img.shields.io/badge/Minecraft-Bedrock-5C8A36?style=flat-square" /></a>
  </p>
</div>

---

## Overview

Minecraft: Bedrock Edition 환경에서 플레이어가 다른 서브 서버로 이동하거나 로그인할 때, 클라이언트 리소스팩 없이 네이티브 `CameraInstructionPacket`을 활용하여 화면을 부드럽게 암전(Fade Out) 및 복구(Fade In)시키는 PocketMine-MP 플러그인입니다.

---

## Features

- **네이티브 카메라 패킷**: 별도의 클라이언트 리소스팩 설치 없이 순수 베드락 카메라 프로토콜로 구현
- **로그인 페이드**: 월드 렌더링 지연 시 발생할 수 있는 시각적 끊김을 완화하는 접속 페이드인
- **서버 트랜스퍼 연동**: `PlayerTransferEvent` 감지 시 즉각적인 페이드아웃 효과 적용

---

## Technical Specifications

| 항목 | 내용 |
|---|---|
| **타겟 플랫폼** | PocketMine-MP (API `5.0.0`) |
| **PHP 요구사항** | PHP `8.1` 이상 |
| **핵심 프로토콜** | `CameraInstructionPacket`, `CameraFadeInstruction` |

---

## Installation

1. 저장소 소스코드를 복사하거나 Phar 패키징을 수행합니다.
2. 서버의 `plugins/SmoothTransfer/` 디렉토리에 배치합니다.
3. 서버 시작 시 자동으로 로드되며, 별도의 설정 파일이나 명령어 없이 즉시 적용됩니다.

---

## Preview

![Preview](./assets/image.png)